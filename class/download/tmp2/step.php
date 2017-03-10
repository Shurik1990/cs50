<?php

// Подключаем файл настроек
require_once __DIR__.'/config.php';

// Иницииализируем движок - подключаем файлы и выполняем необходимые действия
require_once DIR_LIB.'/init.php';


if(!empty($_GET['user']))
{
	$user = (int) $_GET['user'];
}
else
{
	$user = 2;
}

if( ! empty($_GET['game_id']) )
{
	$game_id = (int) $_GET['game_id'];
}
else
{
	$result['status'] = 'error';
	$result['message'] = 'Не передан ид. игры';
	echo json_encode($result);
	return;
}

$area = Db::get_area($game_id);

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
	$result['message'] = 'Не ваш ход';
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
		
		Db::save_status($game_id, $area);
		
		$winner_exists = $winner_id = winner_exists($area);
		if($winner_exists)
		{
			$result['status'] = 'winner';
			if( $winner_id == $user )
			{
				$result['message'] = 'Вы победили';
			}
			else
			{
				$result['message'] = 'Вы проиграли';
			}
			Db::end_game($game_id);
			echo json_encode($result);
			return;
		}
		else
		{
			$result['status'] = 'ok';
		}
		
	}
	else
	{
		$result['status'] = 'error';
		$result['message'] = 'Ячейка занята';
	}
	
	
}
else
{
	$winner_exists = $winner_id = winner_exists($area);
	
	if($winner_exists)
	{
		$result['status'] = 'winner';
		if( $winner_id == $user )
		{
			$result['message'] = 'Вы победили';
		}
		else
		{
			$result['message'] = 'Вы проиграли';
		}
		echo json_encode($result);
		return;
	}
	
	$result['status'] = 'error';
	$result['message'] = 'Не переданны данные';
}


$result['area'] = $area;
echo json_encode($result);


?>