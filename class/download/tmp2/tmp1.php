<?php

abstract class Controller
{
	const API_KEY = '61dtdfv616';

	protected static $count_init = 0;
	
	protected $title = "title";
	protected $vars;
//	protected static $key = '61dtdfv616';
	
	

	public function __construct($params)
	{
		self::$count_init++;
		
	}
	
	abstract public function print_page($vars)
	{
	
	}
	
	public function gat_vars()
	{
		return $this->vars;
	}
	
	public static function escape($string)
	{
		$var = $this->vars;
		return $string;
	}
	
	public static function get_count()
	{
		return self::$count_init;
	}
	
	
	public function get_count_2()
	{
		return self::$count_init;
	}
	
}


