<?php
// Start session for name and favorite languages
session_start();

// Handle color selection (cookie)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['color'])) {
    $color = $_POST['color'];
    // Store color in cookie for 30 days
    setcookie("theme_color", $color, time() + (30 * 24 * 60 * 60));
} else {
    // If the color form wasn’t submitted, check existing cookie
    $color = isset($_COOKIE['theme_color']) ? $_COOKIE['theme_color'] : 'white';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies & Sessions Demo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: <?= htmlspecialchars($color) ?>;
            margin: 40px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            width: 320px;
            margin-bottom: 20px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        select, input {
            width: 100%;
            margin-top: 8px;
            margin-bottom: 12px;
            padding: 6px;
        }
        input[type="submit"] {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            padding: 8px;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        ul {
            list-style-type: square;
        }
    </style>
</head>
<body>
    <?php if ($username): ?>
        <h1>Welcome, <?= htmlspecialchars($username) ?>!</h1>
    <?php else: ?>
        <h1>Welcome to our website!</h1>
    <?php endif; ?>

    <h2>Choose a theme color</h2>
    <form method="post">
        <label for="color">Select color:</label>
        <select name="color" id="color">
            <option value="white" <?= $color === 'white' ? 'selected' : '' ?>>White</option>
            <option value="lightblue" <?= $color === 'lightblue' ? 'selected' : '' ?>>Light Blue</option>
            <option value="lightgreen" <?= $color === 'lightgreen' ? 'selected' : '' ?>>Light Green</option>
            <option value="lightpink" <?= $color === 'lightpink' ? 'selected' : '' ?>>Light Pink</option>
            <option value="lightgray" <?= $color === 'lightgray' ? 'selected' : '' ?>>Light Gray</option>
        </select>
        <input type="submit" value="Change Theme">
    </form>

    
</body>
</html>
