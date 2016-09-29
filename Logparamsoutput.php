<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<script src="http://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<style type="text/css">
table.sortable thead {
	background-color:#eee;
	color:#666666;
	font-weight: bold;
	cursor: default;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
</html>
<?php

$log = $_GET["log"];

$public_api_key = "79558223d2ecf04879a75f44d61866d0";

$log_code = str_replace("https://www.warcraftlogs.com/reports/","","$log");

$json_log = file_get_contents("https://www.warcraftlogs.com:443/v1/report/fights/$log_code?api_key=$public_api_key");

$data = json_decode($json_log, TRUE);

$time_start = $data['start'];
$time_end = $data['end'];

$array_fights = $data['fights'];

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator($array_fights),
    RecursiveIteratorIterator::SELF_FIRST);

$id = 0;	
echo '<table class="sortable" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><th>ID</th><th>Boss</th><th>Schwierigkeitsgrad</th></tr>';
foreach ($jsonIterator as $key => $val) {
    if(is_array($val))
	{
		$id   = $val['id'];
		$boss = $val['boss'];
		$name = $val['name'];
        if ($boss != 0)
		{
			$difficulty = $val['difficulty'];
			echo "<tr><td>$id</td><td><a href='http://127.0.0.1:8044/test/Bosse/$name.php?log=$log&fight=$id'>$name</a></td><td>$difficulty</td><tr>";
		}
    } else if($key === "boss") {
        //echo "$key=$val\n ";
    }
}
echo '</table>';
?>