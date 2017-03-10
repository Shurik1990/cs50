<!DOCTYPE html>
<html>
    <head>
        <title>Set PHP</title>
        <link href="/style.css" rel="stylesheet">
    </head>
        <body>
            <?php
            
            $str = file_get_contents('text.txt');
            $words = explode(' ', $str);
            $max_word = $words[0];
            $count_words = count($words);
            
            /*
            for($i = 1; $i < count($words); $i++)
            {
                if(strlen($words[$i]) > trim($max_word))
                {
                    $max_word = $words[$i];
                }
            }
            
            foreach($words as $word)
            {
                $word = trim($word);
                if(strlen($word) > trim($max_word))
                {
                    $max_word = $word;
                }
            }
            
            echo "Max word: ".$max_word;
            */
            $words['last'] = 'lastword';
            foreach($words as $i => $word)
            {
                if($i % 3 == 0)
                {
                    printword();
                }
                else
                {
                    printword($word);
                }
                
            }
            
            error_reporting(E_ALL);
            
            function printword($word1 = 'no word')
            {
                echo "$word1 \n";
            }
            ?>
        </body>
</html>