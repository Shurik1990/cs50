<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';


if(!empty($_GET['user']))
{
	$user = $_GET['user'];
}
else
{
	$user = 2;
}

$area = unserialize( file_get_contents(__DIR__.'/state.dat') );

$user_bal = 0;
for($row=0; $row<3; $row++)
{
	for($cell=0; $cell<3; $cell++)
	{
		if($area[$row][$cell] == $user)
		{
			$user_bal++;
		}
		elseif($area[$row][$cell] != 0)
		{
			$user_bal--;
		}
	}
}

if($user == 1 && $user_bal > 0 || $user == 2 && $user_bal > -1)
{
	$result['status'] = 'error';
	echo json_encode($result);
	return;
}


$result = array();

if( isset($_GET['cell']) && isset($_GET['row']))
{
	$row = $_GET['row'];
	$cell = $_GET['cell'];
	
	if( $area[$row][$cell] == 0 )
	{
		$area[$row][$cell] = $user;
		file_put_contents(__DIR__.'/state.dat', serialize($area));
		$result['status'] = 'ok';
	}
	else
	{
		$result['status'] = 'error';
	}
	
	
}
else
{
	$result['status'] = 'error';
}


$result['area'] = $area;
echo json_encode($result);


?>