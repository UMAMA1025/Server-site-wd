<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form action="Age_range.php" method="get">
            Input age: <input type="number" name="age" Required>
            <input type="submit">
        </form>
       
        <?php
       
         $Age = $_GET["age"];
          if ($Age <100 && $Age >=0){
         if ($Age <=10 && $Age > 0){
            echo("He is between 0 and 10 years old");
         }
         if ($Age <=20 && $Age > 10){
            echo("He is between 10 and 20 years old");
         }
         if ($Age <=30 && $Age > 20){
            echo("He is between 20 and 30 years old");
         }
         if ($Age <=40 && $Age > 30){
            echo("He is between 30 and 40 years old");
         }
         if ($Age <=50 && $Age > 40){
            echo("He is between 40 and 50 years old");
         }
         if ($Age <=60 && $Age > 50){
            echo("He is between 50 and 60 years old");
         }
         if ($Age <=70 && $Age > 60){
            echo("He is between 60 and 70 years old");
         }
         if ($Age <=80 && $Age > 70){
            echo("He is between 70 and 80 years old");
         }
         if ($Age <=90 && $Age > 80){
            echo("He is between 80 and 90 years old");
         }
         if ($Age <=100 && $Age > 90){
            echo("He is between 90 and 100 years old");
         }
        }
         else{
            echo"Out of range";
         }


        ?>
    </body>
</html>
