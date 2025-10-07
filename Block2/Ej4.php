<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Exercise 4</title>
    </head>
    <body>
    <?php
        $str = "apple pear lemon watermelon melon";

        
        $words = explode(" ", $str);

        $wordLengths = [];
        foreach ($words as $word) {
            $wordLengths[$word] = strlen($word);
        }

        print_r($wordLengths);
        ?>

    </body>
</html>