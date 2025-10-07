<DOCTYPE HTML>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Palindrome</title>
        </head>
        <body>
            <form action="Palindropme.php" method="get">
                Word: <input type="text" name="word">
                <input type="submit" value="check">

            </form>
            <?php
            if (isset ($_GET["word"])){
                $word = $_GET["word"];
                $newword = strrev($word);
                // we can also compare with 3 equals === 
                if (strcmp($newword, $word) !== 0){
                    echo"Its not a palindrome";
                }
                else{
                    echo"Its a palindrome";
            }
        }
            ?>
        </body>
    </html>
</DOCTYPE>