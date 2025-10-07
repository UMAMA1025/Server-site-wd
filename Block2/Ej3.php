<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercise 3</title>
    </head>
    <body>
        <?php 
        $num = 20;
        for($i = 1; $i <= $num; $i++){
            $randomnum[] = rand(0,100);
        
        }
        
        sort($randomnum);
        $smallest = $randomnum[0];
        $largest = $randomnum[count($randomnum) - 1];
        $sum = array_sum($randomnum);
        $mean = round($sum / count($randomnum), 2);

        echo("Random numbers Array: ");
        echo implode(", " , $randomnum);

        echo "<h3>Sorted Numbers:</h3><p>"; 
        foreach ($randomnum as $num) {
            if ($num == $smallest) {
                echo "<span style='color: blue; font-weight: bold;'>$num</span> ";
            } elseif ($num == $largest) {
                echo "<span style='color: green; font-weight: bold;'>$num</span> ";
            } else {
                echo "$num ";
            }
        }
        echo "</p>";

        echo "<p><strong>Sum:</strong> $sum</p>";
        echo "<p><strong>Mean:</strong> $mean</p>";

        ?>
    </body>
</html>