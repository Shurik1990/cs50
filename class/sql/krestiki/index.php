<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';


/*
$Tpl = new Tpl();
$Tpl->set_tpl("game");
$content = $Tpl->parse();
*/

if(!empty($_GET['user']))
{
	$user = $_GET['user'];
}
else
{
	$user = 2;
}

$area = unserialize( file_get_contents(__DIR__.'/state.dat') );



ob_start();
include DIR_TPL.'/game.tpl';
$content = ob_get_clean();
//$content = ob_get_flush();
//ob_clean();



$Page = new Page();

$Page->set_tpl("index");
$Page->set_title("Игра");

$Page->set_var("content", $content);

$Page->render();



?>