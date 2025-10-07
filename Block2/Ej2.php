<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercise 2</title>
    </head>
    <body>
        <form>
            Rows: <input type="number" name="row"><br>
            Columns: <input type="number" name="col"><br>
            <input type="submit" value="Create Table"><br><br>
        </form>
        <?php
       
       if(isset ($_GET["row"]) && isset ($_GET["col"])){
        $rows = (int)$_GET["row"];
        $cols = (int)$_GET["col"];
        createTable($rows , $cols);
       }
    function createTable($rows, $cols) {
        echo("<table border='1'>");
        for($i=1; $i<= $rows; $i++){
            echo("<tr>");
            for($j=1; $j<= $cols; $j++){
                echo("<td> $i$j</td>");
                
            }
            
            echo("</tr>");
        }
        echo("</table>");

        }
    
?>

    </body>
</html>