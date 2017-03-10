<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';


require_once DIR_LIB.'/IndexPage.php';

$Page = new IndexPage();

$Page->render();






?>