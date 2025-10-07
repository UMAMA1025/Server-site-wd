<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>

    <body>
        <form action="Community.php" method="get">
            Floor: <input type="number" name="floor">
            Door: <input type="number" name="door">
            <input type="submit">
        </form>
        <?php 
      
        $floor = (int)$_GET["floor"];
        $door = (int)$_GET["door"];

        echo "<h3>Community List</h3><ul>";

        for ($i = 1; $i <= $floor; $i++) {
            for ($j = 1; $j <= $door; $j++) {
                echo "<li>Floor $i - Door $j</li>";
            }
        }

        echo "</ul>";
    
        ?>
    </body>
</html>