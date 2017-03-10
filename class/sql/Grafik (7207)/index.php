<!doctype html>
<head>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="/js/morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="/css/morris.css">
</head>
<body>
<h1>Load Average</h1>
<div id="graph"></div>
<?php
if( ! empty($_GET['to']) )
{
	$date_to = $_GET['to'];
}
else
{
	$date_to = date('Y-m-d', time());
}

if( ! empty($_GET['from']) )
{
	$date_from = $_GET['from'];
}
else
{
	$date_from = date('Y-m-d', time() - 60*60*24*7 );
	header("Location: /?from={$date_from}&to={$date_to}");
}


require_once (__DIR__.'/libs/MysqliDb.php');

$db = new MysqliDb ('localhost', 'root', '', 'load');

$data = array();

$rows = $db->rawQuery( 'SELECT * FROM statistic WHERE `date` BETWEEN ? AND ?', Array ($date_from, $date_to) );
foreach ($rows as $row) {
    $data[] = array(
		'date' => $row['date'],
		'time' => $row['time'],
		'la' => $row['la']
	);
}

$decimal_data = json_encode($data);

?>
<script>
var decimal_data = <?php echo $decimal_data; ?>;

window.m = Morris.Line({
  element: 'graph',
  data: decimal_data,
  xkey: 'date',
  ykeys: ['la'],
  labels: ['LA'],
  parseTime: false,
  hoverCallback: function (index, options, default_content, row) {
   // return default_content.replace("sin(x)", "1.5 + 1.5 sin(" + row.x + ")");
    return row.date + " " + row.time + "<br/>" + "LA: " + row.la;
  },
  xLabelMargin: 10,
  integerYLabels: true
});
</script>
</body>
