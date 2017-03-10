<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';


$Tpl = new Tpl();
$Tpl->set_tpl("form");
$content = $Tpl->parse();

$Page = new Page();

$Page->set_tpl("index");
$Page->set_title("Загрузка изобр.");

$Page->set_var("content", $content);


$Page->render();



?>