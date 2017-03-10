<?php

class Tpl
{
	protected $template_name = 'index';
	protected $vars = array();
	
	public function __construct()
	{
		
	}
	
	public function set_tpl($template_name)
	{
		$this->template_name = $template_name;
	}
	
	public function set_var($key, $value)
	{
		$this->vars[$key] = $value;
	}
	
	public function parse()
	{
		$tpl_path = DIR_TPL.'/'.$this->template_name.'.tpl'; // путь к файлу шаблона
		$template = file_get_contents( $tpl_path ); // считываем файл шаблона
	
		// Проходимся по всем ключам и по очереди заменяем совпадения.
		foreach($this->vars as $key => $value)
		{
			// Делаем замену: {key} -> $value
			$template = str_replace( sprintf('{%s}', $key), $value, $template);
		}
	
		return $template;
	}
	
}







