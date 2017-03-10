<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';


$Page = new Page();

$Page->set_tpl("text");
$Page->set_title("Text page");

$Page->set_var("text", Db::get_text());

$Page->render();



?>