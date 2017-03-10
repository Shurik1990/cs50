<?php

class Db
{
	
	/**
	 * Возвращает текст
	 * @return string Текст
	 */
	static function get_text()
	{
		$row = DB::row('SELECT * from `text` where id = 1');
		
		return $row['text'];
	}
	
	public static function row($query)
	{
		$db = MysqliDb::getInstance();
		$text = $db->rawQuery($query);
		
		return $text[0];
	}
	
}

/*
class User
{
	private $name;
	
	public function getName()
	{
		return $this->name;
	}
}

$User = new User;
echo $User->getName();
*/






