<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercise 5</title>
    </head>
    <body>
        
        <?php 
        $months =[
            ["indice" => "January", "Valor" => 31],
            ["indice" => "February", "Valor" => 28],
            ["indice" => "March", "Valor" => 31],
            ["indice" => "April", "Valor" => 30],
            ["indice" => "May", "Valor" => 31],
            ["indice" => "June", "Valor" => 30],
            ["indice" => "July", "Valor" => 31],
            ["indice" => "August", "Valor" => 31],
            ["indice" => "September", "Valor" => 30],
            ["indice" => "Octuber", "Valor" => 31],
            ["indice" => "November", "Valor" => 30],
            ["indice" => "December", "Valor" => 31]];
            
            echo"<table border='2px'>";
            echo"<td>Indice</td>";
            echo"<td>Valor</td>";
            foreach($months as $element){
                echo"<tr>";
                    
                    echo "<td>" . $element['indice'] . "</td>";
                    echo "<td>" . $element['Valor'] . "</td>";
                echo"</tr>";
            }
            echo"</table>";
        
        ?>
    </body>
</html>