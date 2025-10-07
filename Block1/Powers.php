<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Powers</title>
    </head>
    <body>
        <form action="Powers.php" method="get">
            Power: <input type="number" name="power"><br>
            Quantitiy: <input type="number" name="quan"><br>
            <input type="submit" value="check">
        </form>

        <?php 
        if(isset ($_GET["power"]) && ($_GET["quan"])){
            $power = (int)$_GET["power"];
            $quan = (int)$_GET["quan"];

            $n = 1;
            while(pow($n, $power) < $quan){
                $result = pow($n, $power);
                echo "$n - $result<br>";
            $n++;
            }

        }
        ?>
    </body>
</html>