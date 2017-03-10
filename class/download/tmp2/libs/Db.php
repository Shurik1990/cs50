<?php

class Db
{
	static function init()
	{
		$db = new MysqliDb (DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	}
	
	static function new_game($area)
	{
		$area = array();
		for($row=0; $row<3; $row++)
		{
			for($cell=0; $cell<3; $cell++)
			{
				$area[$row][$cell] = 0;
			}
		}
		
		$db = MysqliDb::getInstance();
		$data['area'] = serialize($area);
		$data['complete'] = 'N';
		$id = $db->insert ('games', $data);
		
		return $id;
	}
	
	static function save_status($id, $area)
	{
		$db = MysqliDb::getInstance();
		$db->where('id', $id);
		$data['area'] = serialize($area);
		$db->update ('games', $data);
	}
	
	static function get_area($id)
	{
		$row = self::row("SELECT area FROM games WHERE id='{$id}'");
		
		$area = unserialize($row['area']);
		return $area;
	}
	
	static function end_game($id)
	{
		$db = MysqliDb::getInstance();
		$db->where('id', $id);
		$data['complete'] = 'Y';
		$db->update ('games', $data);
	}
	
	static function get_games_list()
	{
		$db = MysqliDb::getInstance();
		$rows = $db->rawQuery("SELECT * FROM games WHERE complete='N'");
		
		return $rows;
	}
	
	
	
	public static function row($query)
	{
		$db = MysqliDb::getInstance();
		$row = $db->rawQuery($query);
		
		return $row[0];
	}
	
	public static function add_file($filename)
	{
		$db = MysqliDb::getInstance();
		
		$data = array(
			'filename' => $filename,
			'date_added' => time()
		);
		
		$id = $db->insert('files', $data);
		
		return $id;
	}
	
	
}






