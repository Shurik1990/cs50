<?php

/**
 * Заспарсивает шаблон и возвращает текст
 */
function parse_tpl($name, $values = array())
{
	$tpl_path = DIR_TPL.'/'.$name.'.tpl'; // путь к файлу шаблона
	$template = file_get_contents( $tpl_path ); // считываем файл шаблона
	
	// Проходимся по всем ключам и по очереди заменяем совпадения.
	foreach($values as $key => $value)
	{
		// Делаем замену: {key} -> $value
		$template = str_replace( sprintf('{%s}', $key), $value, $template);
	}
	
	return $template;
}

/*
function get_text()
{
	return file_get_contents( DIR_DB . '/text.txt' );
}
*/

/**
 * Ищет слово в тексте и возвращает массив всех вхождений
 * @param string $query Фраза, которая ищется
 * @return array Массив с результатами поиска
 */
function find_text($query)
{
//	$text = get_text();
	$text = Db::get_text(); // Получаем текст, в котором будет искаться фраза
	
	$matches = array(); // Массив вхождений (совпадений)
	
	$offset = 0; // Позиция смещения в тексте. Для продолжения поиска с последнего места.
	do
	{
		$pos = strpos( $text, $query, $offset ); // Ищем совпадение, начиная с последней позиции в тексте
		
		if( $pos !== FALSE )
		{
			// Что-то нашлось
			$offset = $pos + strlen($query); // Переопределяем последнюю позицию. Дальше поиск будет с этого места.
			$matches[] = array(
				'pos' => $pos
			);
		}
	}
	while( $pos !== FALSE );
	
	return $matches;
}

