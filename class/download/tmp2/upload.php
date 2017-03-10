<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';

$filename = time().'.'.$extension = pathinfo($_FILES['f']['name'], PATHINFO_EXTENSION);


if (move_uploaded_file($_FILES['f']['tmp_name'], DIR_FILES.'/'.$filename))
{
	$id = Db::add_file($filename);
	
	
    echo "Файл был успешно загружен.\n";
}
else
{
    echo "Ошибка\n";
}





?>