<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';



$area = array();
for($row=0; $row<3; $row++)
{
	for($cell=0; $cell<3; $cell++)
	{
		$area[$row][$cell] = 0;
	}
}

file_put_contents(__DIR__.'/state.dat', serialize($area));

header('Location: /?user=1');



?>