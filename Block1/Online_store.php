<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf_8">
        <title>Exercise 10</title>
    </head>
    <body>
        <form>
            Total Bill: <input type="number" name="bill"><br>
            Type of shopping:
            <select name="tipo">
                <option value="pets">Pets</option>
                <option value="clothes">Clothes</option>
            </select>
            <input type="submit">

        </form>
        <?php 
        if(isset($_GET["bill"]) && isset($_GET["tipo"])){
            $total_compra = $_GET["bill"];
            $tipo_compra = $_GET["tipo"];
            $VTA =0;

            if($total_compra < 19 && $tipo_compra === "pets"){
                echo("Unable to send.");
            }
            else if($total_compra < 19 && $tipo_compra === "clothes"){
                echo("Shipping costs are 9 euros");
               
            }
            else if($total_compra <= 40){
                echo("The shipping costs are 9 euros");
                
            }
            else if($total_compra > 80){
                echo"The shipping costs are free.";
            }

        }
        if($tipo_compra === "pets"){
             $VTA = $total_compra * 0.10;
                $total_price = $total_compra + $VTA + 9;
                echo("<br>Total price: $total_price");
        }
        else{
            $VTA = $total_compra * 0.21;
                $total_price = $total_compra + $VTA + 9;
                echo("<br>Total price: $total_price");
        }
        ?>
    </body>
</html>