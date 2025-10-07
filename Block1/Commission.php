<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercise 9</title>
    </head>
    <body>
        <form action="Commission.php" method="get">
            Amount of sales: <input type="number" name="sales"><br>
            check commission: <input type="submit">

        </form>

        <?php 
        if(isset($_GET["sales"])){
            $precentage ;
            $sales = (int)$_GET["sales"];
            $commission ;
            if($sales < 10000){
                $precentage = 0.05;
                $commision = $sales * $precentage;
                echo("Commission is  $commision");
            }
            else if($sales <= 20000 ){
                $precentage = 0.08;
                $commision = $sales * $precentage;
                echo("Commission is  $commision");
            }
            else if($sales <= 40000){
                $precentage = 0.10;
                $commision = $sales * $precentage;
                echo("Commission is  $commision");
            }
            else{
                $precentage = 0.13;
                $commision = $sales * $precentage;
                echo("Commission is  $commision");
            }
        }
        ?>
            
        </body>
</html>