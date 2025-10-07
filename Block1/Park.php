<DOCTYPE HTML>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Park Entrance</title>
        </head>
        <body>
            <h2>Park Entry Validation</h2>
            <form action="Park.php" method="get">
                Age: <input type="number" name="age"><br>
                Height: <input type="number" name="height"><br>
                Accompained: <input type="checkbox" name="accom"><br>
                <input type="submit" value="Check Entery">
            </form>

            <?php
            if(isset($_GET["age"]) || ($_GET["height"])|| ($_GET["accom"])){
                $age = $_get["age"];
                $height = $_get["height"];
                $acc = $_get["aaccom"];

                if($age > 10 || $height > 120){
                    echo"The person can climb";
                }
                elseif(($age > 6 && $age <11 ) && $acc != 0 ){
                    echo"The person can climb";
                }
                else{
                    echo"The person can not climb";
                }
                }
        
            ?>

        </body>
    </html>
</DOCTYPE>