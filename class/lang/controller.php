<?php

define('LANG_DIR', __DIR__.'');

if( ! empty($_GET['lang']) && in_array($_GET['lang'], array('ru', 'en')) )
{
	$lg = $_GET['lang'];
}
else
{
	$lg = 'ru';
}

include LANG_DIR.'/'.$lg.'/contacts.php';

Lang::set_lang($lang);


function lang($key)
{
	return Lang::lang($key);
}

function plang($key)
{
	echo lang($key);
}

class Lang
{
	public static $vars;

	public function __construct()
    {
        // Constructor's functionality here, if you have any.
    }	
	
	public static function set_lang($vars)
	{
		self::$vars = $vars;
	}
	
	public static function lang($key)
	{
		if( ! empty(Lang::$vars[$key]))
		{
			return Lang::$vars[$key];
		}
		else
		{
			return '['.$key.']';
		}
	}



}
