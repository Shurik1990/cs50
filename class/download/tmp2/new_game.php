<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';



$game_id = Db::new_game();


header("Location: /?user=1&game_id={$game_id}");



?>