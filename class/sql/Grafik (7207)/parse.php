<?php

require_once ( __DIR__.'/libs/MysqliDb.php');
$db = new MysqliDb ('localhost', 'root', '', 'load');


$strings = file(__DIR__.'/loadavg.log');

foreach($strings as $string)
{
	
	$b_matched = preg_match('@(\d{4}-\d{2}-\d{2})/(\d{2}:\d{2})\sLA:\s\d\.\d\d \d\.\d\d (\d\.\d\d)\sCPU:\s[.\d]+%@', $string, $matches);
	
	if( $b_matched )
	{
		list($null, $date, $time, $la) = $matches;
		
		$data = Array (
			"date" => $date,
			"time" => $time,
			"la" => $la
		);
		$db->insert ('statistic', $data);
	}
	
}








