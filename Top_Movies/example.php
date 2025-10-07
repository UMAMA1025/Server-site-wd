<?php
session_start();

// Initialize movies with some examples
if (!isset($_SESSION['movies'])) {
    $_SESSION['movies'] = [
        '11111111' => ['name' => 'Superman', 'year' => 1948, 'punctuation' => 4],
        '22222222' => ['name' => 'Superman', 'year' => 1978, 'punctuation' => 5],
        '33333333' => ['name' => 'Batman vs. Superman', 'year' => 2016, 'punctuation' => 3],
        '44444444' => ['name' => 'Superman & Lois', 'year' => 2021, 'punctuation' => 4],
    ];
}

$movies = &$_SESSION['movies'];
$message = '';
$searchResults = [];

// Helper: remove accents for search
function remove_accents($str) {
    return iconv('UTF-8', 'ASCII//TRANSLIT', $str);
}

// Validate ISAN (exactly 8 digits)
function valid_isan($isan) {
    return preg_match('/^\d{8}$/', $isan);
}

// Process form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(strip_tags($_POST['name'] ?? ''));
    $isan = trim(strip_tags($_POST['isan'] ?? ''));
    $year = trim(strip_tags($_POST['year'] ?? ''));
    $punctuation = trim(strip_tags($_POST['punctuation'] ?? ''));

    // Condition 1: If name and ISAN both empty
    if ($name === '' && $isan === '') {
        $message = 'Warning: Name and ISAN cannot both be empty.';
    } 
    // Condition 3: ISAN empty, name given → search movies by name
    elseif ($isan === '' && $name !== '') {
        $searchName = strtolower(remove_accents($name));
        foreach ($movies as $k => $movie) {
            $movieName = strtolower(remove_accents($movie['name']));
            if (strpos($movieName, $searchName) !== false) {
                $searchResults[$k] = $movie;
            }
        }
        if (empty($searchResults)) {
            $message = 'No movies found containing "' . htmlspecialchars($name) . '".';
        }
    }
    // ISAN given (not empty)
    elseif ($isan !== '') {
        if (!valid_isan($isan)) {
            $message = 'Warning: ISAN must be exactly 8 digits.';
        } else {
            // ISAN not in list
            if (!isset($movies[$isan])) {
                // Add new movie if all fields filled
                if ($name !== '' && $year !== '' && $punctuation !== '') {
                    if (is_numeric($year) && $punctuation >= 0 && $punctuation <= 5) {
                        $movies[$isan] = ['name' => $name, 'year' => (int)$year, 'punctuation' => (int)$punctuation];
                        $message = 'Movie added successfully.';
                    } else {
                        $message = 'Warning: Year must be numeric, punctuation between 0 and 5.';
                    }
                } else {
                    $message = 'Warning: All fields must be filled to add a new movie.';
                }
            }
            // ISAN exists in list
            else {
                // Delete movie if name empty
                if ($name === '') {
                    unset($movies[$isan]);
                    $message = 'Movie deleted successfully.';
                } else {
                    // Update movie name and punctuation if all fields given
                    if ($year !== '' && $punctuation !== '') {
                        if (is_numeric($year) && $punctuation >= 0 && $punctuation <= 5) {
                            $movies[$isan]['name'] = $name;
                            $movies[$isan]['year'] = (int)$year;
                            $movies[$isan]['punctuation'] = (int)$punctuation;
                            $message = 'Movie updated successfully.';
                        } else {
                            $message = 'Warning: Year must be numeric, punctuation between 0 and 5.';
                        }
                    } else {
                        $message = 'Warning: All fields must be filled to update the movie.';
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Movie Ratings</title>
<style>
    body { font-family: Arial, sans-serif; max-width: 700px; margin: 20px auto; }
    table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background: #eee; }
    .warning { color: red; font-weight: bold; }
    .success { color: green; font-weight: bold; }
</style>
</head>
<body>

<h2>Movies List</h2>
<?php if (!empty($movies)): ?>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>ISAN</th>
            <th>Year</th>
            <th>Punctuation</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($movies as $isanKey => $movie): ?>
        <tr>
            <td><?= htmlspecialchars($movie['name']) ?></td>
            <td><?= htmlspecialchars($isanKey) ?></td>
            <td><?= htmlspecialchars($movie['year']) ?></td>
            <td><?= htmlspecialchars($movie['punctuation']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
<p>No movies registered yet.</p>
<?php endif; ?>

<?php if ($searchResults): ?>
<h3>Search results for "<?= htmlspecialchars($name) ?>"</h3>
<ul>
    <?php foreach ($searchResults as $isanKey => $movie): ?>
    <li><?= htmlspecialchars($movie['name']) ?> from <?= htmlspecialchars($movie['year']) ?> (ISAN: <?= htmlspecialchars($isanKey) ?>)</li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<?php if ($message): ?>
<p class="<?= strpos($message, 'Warning') === 0 ? 'warning' : 'success' ?>"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<h2>Add / Update / Delete Movie</h2>
<form method="POST" action="">
    <label>Movie Name:<br>
        <input type="text" name="name" value="<?= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />
    </label><br><br>

    <label>ISAN (8 digits):<br>
        <input type="text" name="isan" maxlength="8" value="<?= isset($_POST['isan']) ? htmlspecialchars($_POST['isan']) : '' ?>" />
    </label><br><br>

    <label>Year:<br>
        <input type="text" name="year" value="<?= isset($_POST['year']) ? htmlspecialchars($_POST['year']) : '' ?>" />
    </label><br><br>

    <label>Punctuation:<br>
        <select name="punctuation">
            <?php 
            $selectedPunc = $_POST['punctuation'] ?? '';
            for ($i=0; $i<=5; $i++): ?>
                <option value="<?= $i ?>" <?= ($selectedPunc !== '' && $selectedPunc == $i) ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
    </label><br><br>

    <button type="submit">Send</button>
</form>

</body>
</html>
