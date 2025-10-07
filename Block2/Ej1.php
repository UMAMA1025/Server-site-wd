<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercise 1</title>
    </head>
    <body>
        <?php
        $a = array(0,1,2,3,4,5,6,7,8,9);

       
        echo("Original array:<br>");
        echo implode(",", $a);
         echo("<br>--------------------");
        foreach($a as $element){
            $factorial = 1;
            for($i = 1; $i <= $element; $i++){
                $factorial = $factorial * $i;
            }
            
            $fact[] = $factorial;
        }
      
        echo("<br> New Array: <br>");
        echo implode(" , ", $fact);
         ?>
    </body>
</html>