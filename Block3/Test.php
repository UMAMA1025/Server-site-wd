<html>
    <head>
            <meta charset="utf-8">
            <title>Test Class</title>
    </head>
    <body>
        <?php
            include("Runner.php");
            include("Competition.php");

            $compititon = new Competition();
            $addrunner = $addRunner(new Runner());
            echo"($addrunner)";

        ?>
    </body>
</html>