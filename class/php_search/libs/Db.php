<?php

class Db
{
	
	/**
	 * Возвращает текст
	 * @return string Текст
	 */
	static function get_text()
	{
		return file_get_contents( DIR_DB . '/text.txt' );
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






