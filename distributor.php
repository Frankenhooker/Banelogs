<?php

$log = $_GET["log"];
$boss = $_GET["boss"];

//echo "$log<br>";

list($log1, $log2) = explode('#', $log);

//echo "$log2<br>";

parse_str($log2);

//echo "$fight<br>";
if (isset($fight) == FALSE)
{
	$link = "http://logs.banelings.de/Bosse/$boss.php?log=$log1";		// merge to link
}
else
{
	$link = "http://logs.banelings.de/Bosse/$boss.php?log=$log1&fight=$fight";		// merge to link
}
//echo "$link";
header("Location: $link");		// redirect
die();

?>