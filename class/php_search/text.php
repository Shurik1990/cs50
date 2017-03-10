<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';

// Получаем текст из базы
$blocks['text'] = Db::get_text();

// Распарсиваем шаблон - делаем замены вставок
$main_template = parse_tpl('text', $blocks);

// Выводим HTML (в браузер)
echo $main_template;



?>