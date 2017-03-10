<?php

function winner_exists($area)
{
	for($row=0; $row<3; $row++)
	{
		if ($area[$row][0] != 0 && $area[$row][0] == $area[$row][1] && $area[$row][0] == $area[$row][2])
		{
			return $area[$row][0];
		}
	}
	
	for($cell=0; $cell<3; $cell++)
	{
		if ($area[0][$cell] != 0 && $area[0][$cell] == $area[1][$cell] && $area[0][$cell] == $area[2][$cell])
		{
			return true;
		}
	}
	
	if ($area[0][0] != 0 && $area[0][0] == $area[1][1] && $area[0][0] == $area[2][2])
	{
		return true;
	}
	
	if ($area[0][2] != 0 && $area[0][2] == $area[1][1] && $area[0][0] == $area[2][0])
	{
		return true;
	}
	
	return 0;
}

