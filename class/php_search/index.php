<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';

// Проверяем, был ли запрос на поиск (из формы)
if( ! empty($_GET['q']) )
{
	$query = $_GET['q'];
}
else
{
	$query = '';
}

// Передаём переменные в форму
$form_vars = array (
	'query' => $query
);

// Распарсиваем шаблон - делаем замены вставок
$form = parse_tpl('form', $form_vars);

// Передаём переменную в основной шаблон
$blocks['form'] = $form;

$results = '';

// Делаем поиск, если приходил запрос
if( $query != '' )
{
	// Вызываем функцию поиска
	$matches = find_text($query);
	
	if( count($matches) > 0 )
	{
		// Получаем текст из базы
		$text = Db::get_text();
		
		foreach($matches as $match)
		{
			// С какой позиции мы будем выводить текст
			$pos_start = $match['pos'] - 30;
			if($pos_start < 0)
			{
				$pos_start = 0;
			}
			
			// Выводим строку с совпадением. +30 символов с обеих сторон
			$string = substr( $text, $pos_start, strlen($query) + 30 + 30 );
			
			// Выделяем (в HTML) само слово
			$string = str_replace( $query, sprintf('<b>%s</b>', $query), $string );
			
			// "Приклеиваем" новую сторку к общему тексту
			$results = $results . $string . '<br/>';
		}
	}
}

// Передаём переменную в основной шаблон
$blocks['results'] = $results;

// Распарсиваем шаблон - делаем замены вставок
$main_template = parse_tpl('index', $blocks);

// Выводим HTML (в браузер)
echo $main_template;



?>