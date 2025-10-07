<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="Senior.php" method="get">
            Number 1: <input type="number" name="num1" Required>
            Number 2: <input type="number" name="num2" Required>
            Number 3: <input type="number" name="num3" Required>
            <input type="submit">
        </form>

        <?php
        $Num1 = $_GET["num1"];
        $Num2 = $_GET["num2"];
        $Num3 = $_GET["num3"];

        if ($Num1 > $Num2 && $Num1 > $Num3){
            echo("Number 1 is bigger");
        }
        elseif ($Num2 > $Num1 && $Num2 > $Num3){
            echo("Number 2 is bigger");
        }
        elseif ($Num3 > $Num1 && $Num3 > $Num2){
            echo("Number 3 is bigger");
        }
        else{
            echo"Equal numbers";
        }
        

        ?>
    </body>
</html>
