<?php
session_start();

if (!isset($_SESSION['birthdays'])) {
    $_SESSION['birthdays'] = [
        "January" => ["Mikel", "Ainara", "Xabi"],
        "February" => ["Irati", "Ibai"],
        "March" => ["Haiza"],
        "April" => [],
        "May" => [],
        "June" => [],
        "July" => [],
        "August" => [],
        "September" => [],
        "October" => [],
        "November" => [],
        "December" => []
    ];
}

function addNameToMonth(&$arr, $month, $name, &$count) {
    $month = ucfirst(strtolower($month));

    if (!array_key_exists($month, $arr)) {
        $arr[$month] = [];
    }

    $name = trim($name);
    if ($name !== '') {
        $arr[$month][] = $name;
    }

    $count = count($arr[$month]);
}

$message = '';
$countRegistered = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $month = isset($_POST['month']) ? strip_tags($_POST['month']) : '';
    $name = isset($_POST['name']) ? strip_tags($_POST['name']) : '';

    if ($month && $name) {
        addNameToMonth($_SESSION['birthdays'], $month, $name, $countRegistered);
        $message = "Added '" . htmlspecialchars($name) . "' to " . htmlspecialchars($month) . ". Total registered: $countRegistered.";
    } else {
        $message = "Please select a month and enter a name.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Birthday Registrations</title>
</head>
<body>
    <h2>Add a Name to a Month</h2>
    <form method="POST" action="">
        <label for="month">Month:</label>
        <select id="month" name="month" required>
            <option value="">--Select Month--</option>
            <?php
            foreach (array_keys($_SESSION['birthdays']) as $m) {
                echo '<option value="' . htmlspecialchars($m) . '">' . htmlspecialchars($m) . '</option>';
            }
            ?>
        </select>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Add</button>
    </form>

    <?php if ($message): ?>
        <p><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>

    <h2>Birthdays by Month</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <?php foreach ($_SESSION['birthdays'] as $month => $names): ?>
        <tr>
            <td style="color: pink; font-weight: bold; vertical-align: top;"><?php echo htmlspecialchars($month); ?></td>
            <td>
                <?php
                if (count($names) === 0) {
                    echo "<em>No registrations</em>";
                } else {
                    foreach ($names as $name) {
                        echo htmlspecialchars($name) . "<br>";
                    }
                }
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
