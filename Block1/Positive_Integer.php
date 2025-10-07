<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Powers</title>
    </head>
    <body>
        <form action="Positive_Integer.php" method="get"> 
            Input Number: <input type="number" name="num"><br>
            <input type="submit" value="go">
        </form>
        <?php
        if(isset($_GET["num"])){
            $num = (int)$_GET["num"];

            if ($num <= 0){
                echo "PLease enter a positive number";
            } else{
                while ($num != 1) { 
            if ($num % 2 == 0){
                $num = $num / 2;
            }
            else {
                $num = $num * 3 + 1;
            }
            echo (" $num");
        }
    }
    }
        ?>
    </body>
    </html>
</DOCTYPE>