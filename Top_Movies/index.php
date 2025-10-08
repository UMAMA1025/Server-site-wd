<?php
session_start();

if (!isset($_SESSION['Movies'])) {
    $_SESSION['Movies'] = [
        '11111111' => ['name' => 'Spiderman', 'year' => 1900, 'punctuation' => 4],
        '22222222' => ['name' => 'Spiderman2', 'year' => 1900, 'punctuation' => 4],
        '33333333' => ['name' => 'Spiderman4', 'year' => 1900, 'punctuation' => 3],
        '44444444' => ['name' => 'Spiderman5', 'year' => 2000, 'punctuation' => 2],
        '55555555' => ['name' => 'Spiderman6', 'year' => 2010, 'punctuation' => 0]
    ]; 
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isan = strip_tags($_POST['isan']);
    $name = strip_tags($_POST['name']);
    $year = strip_tags($_POST['year']);
    $punctuation = ($_POST['punctuation']);

    // Clean and format each input
    function clean_text($text) {
        $text = preg_replace('/[^a-z0-9 ]/i', '', $text); 
        $text = strtolower($text);           
        $text = ucwords($text); 
        return trim($text);
    }

     $isan = clean_text($isan);
    $name = clean_text($name);
    $year = clean_text($year);
    // Basic validation
    if ($isan && $name && $year && $punctuation) {
        $_SESSION['Movies'][$isan] = [
            'name' => $name,
            'year' => $year,
            'punctuation' => $punctuation
        ];
    }
}

       
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
    <meta charset="utf-8">
    <style>
        body{
            background: linear-gradient(to right, #db8585ff, #9ea2ceff);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .div{
   
        }
    </style>
</head>
<body>

    <h1>List of Movies</h1>
    <?php
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ISAN</th>";
        echo "<th>Name</th>";
        echo "<th>Year</th>";
        echo "<th>Punctuation</th>";
        echo "</tr>";

        foreach ($_SESSION['Movies'] as $isan => $movie) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($isan) . "</td>";
            echo "<td>" . htmlspecialchars($movie['name']) . "</td>";
            echo "<td>" . htmlspecialchars($movie['year']) . "</td>";
            echo "<td>" . htmlspecialchars($movie['punctuation']) . "</td>";
            echo "</tr>";
        }

            echo "</table>";
        
    
    ?>

    <h2>Add new Movie in the list</h2>
    <div class="div">
    <form method="POST" action="">
        ISAN: <input type="number" name="isan" required><br>
        Name: <input type="text" name="name" required><br>
        Year: <input type="number" name="year" required><br>
        Punctuation: 
        <select name="punctuation" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        <input type="submit" value="ADD">
    </form>
    </div>

  
</body>
</html>
