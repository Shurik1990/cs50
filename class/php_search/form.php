<?php

    require_once __DIR__.'/config.php';
    
    require_once DIR_LIB.'/init.php';
    
    $vars['results'] = '';
    
    $vars['form'] = parse_tpl('registr');
    
    $html = parse_tpl('index', $vars);
    
    echo $html;

?>