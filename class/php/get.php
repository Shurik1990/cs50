<?php

    header('content-type: text/plain');
    
    if(! empty($_GET['file']))
    {
        $string = file_get_contents($_GET['file']);
        echo $string;
    }
    else
    {
        echo "Укажите файл. Параметр file.";
    }
?>