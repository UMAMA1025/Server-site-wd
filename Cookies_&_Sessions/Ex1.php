<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle color
    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        // Save color in a cookie (valid for 30 days)
        setcookie("theme_color", $color, time() + (30 * 24 * 60 * 60));
    }

    if(isset($_POST['name'])){
        $name  = $_POST['name'];
        setcookie("name" , $name, time() + (30 * 24 * 60 * 60) );
    }

    if(isset($_POST['language'])){
        $language = $_POST['language'];
        setcookie("language", $language, time() + (30 * 24 * 60 * 60));
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sessions and Cookies</title>
    <meta charset="utf-8">
</head>
<body style="background-color: <?= htmlspecialchars($color) ?>;">
    <h1>Cookies & Session</h1>
    <h2>Welcome To our Website</h2>

    <form method="POST">
        <label for="color">Select Color:</label>
        <select name="color" id="color">
            <option value="lightblue" <?= $color === 'lightblue' ? 'selected' : '' ?>>Light Blue</option>
            <option value="lightgray" <?= $color === 'lightgray' ? 'selected' : '' ?>>Light Gray</option>
            <option value="lightgreen" <?= $color === 'lightgreen' ? 'selected' : '' ?>>Light Green</option>
            <option value="lightpink" <?= $color === 'lightpink' ? 'selected' : '' ?>>Light Pink</option>
            <option value="orange" <?= $color === 'orange' ? 'selected' : '' ?>>Orange</option>
            <option value="red" <?= $color === 'red' ? 'selected' : '' ?>>Red</option>
            <option value="white" <?= $color === 'white' ? 'selected' : '' ?>>White</option>
        </select><br><br>

        <h2>Name & Favorite Language</h2>
        Enter your name: <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br>
        Select your fav language:
        <select name="language" id="language">
            <option value="php" <?= $language === 'php' ? 'selected' : '' ?>>PHP</option>
            <option value="java" <?= $language === 'java' ? 'selected' : '' ?>>Java</option>
            <option value="sql" <?= $language === 'sql' ? 'selected' : '' ?>>SQL</option>
            <option value="javascript" <?= $language === 'javascript' ? 'selected' : '' ?>>JavaScript</option>
            <option value="cpp" <?= $language === 'cpp' ? 'selected' : '' ?>>C++</option>
            <option value="python" <?= $language === 'python' ? 'selected' : '' ?>>Python</option>
            <option value="ruby" <?= $language === 'ruby' ? 'selected' : '' ?>>Ruby</option>
            <option value="csharp" <?= $language === 'csharp' ? 'selected' : '' ?>>C#</option>
            <option value="go" <?= $language === 'go' ? 'selected' : '' ?>>Go</option>
            <option value="swift" <?= $language === 'swift' ? 'selected' : '' ?>>Swift</option>
            <option value="typescript" <?= $language === 'typescript' ? 'selected' : '' ?>>TypeScript</option>
        </select><br><br>

     

        <input type="submit" value="Submit">
    </form>

     <?php if ($name || $language): ?>
       <h3>Youe information</h3>
       <?php if($name): ?>
        <p><Strong>Name: </Strong><?= htmlspecialchars($name) ?></p>
        <?php endif; ?>
        <?php if($language): ?>
        <p><strong>Your favorite programming language: </strong> <?= htmlspecialchars(ucfirst($language)) ?></p>
        <?php endif; ?>
    <?php endif; ?>


</body>
</html>