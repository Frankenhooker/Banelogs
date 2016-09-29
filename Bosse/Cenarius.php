<!DOCTYPE html>
<html>
<head>
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
$fight = $_GET["fight"];

//Mechaniken

//echo "$log<br>";

$Damage_taken_creeping_nightmare = "&ability=210279&type=damage-taken";
$Damage_taken_events_rotten_breath = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Rotten+Breath%22&view=events&type=damage-taken";
$Damage_taken_events_dread_thorns = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Dread+Thorns%22&type=damage-taken";
$Damage_done_entangling_roots = "&pins=2%24Off%24%23244F4B%24damage%240%24108040.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&view=events";

echo '<table class="sortable" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><th>Mechanik</th><th>Link</th></tr>';
if (isset($fight) == TRUE)
{
echo "<tr><td>Damage_taken_creeping_nightmare</td><td><a href='$log#fight=$fight$Damage_taken_creeping_nightmare'>DMG Taken Creeping Nightmares</a></td><tr>";
echo "<tr><td>Damage_taken_events_rotten_breath</td><td><a href='$log#fight=$fight$Damage_taken_events_rotten_breath'>DMG Taken RottenBreath</a></td><tr>";
echo "<tr><td>Damage_taken_events_dread_thorns</td><td><a href='$log#fight=$fight$Damage_taken_events_dread_thorns'>DMG Taken DreadThorns</a></td><tr>";
echo "<tr><td>Damage_done_entangling_roots</td><td><a href='$log#fight=$fight$Damage_done_entangling_roots'>Focus DMG EntanglingRoots</a></td><tr>";
}
else
{
echo "<tr><td>Damage_taken_creeping_nightmare</td><td><a href='$log#$Damage_taken_creeping_nightmare'>DMG Taken Creeping Nightmares?</a></td><tr>";
echo "<tr><td>Damage_taken_events_rotten_breath</td><td><a href='$log#$Damage_taken_events_rotten_breath'>DMG Taken RottenBreath</a></td><tr>";
echo "<tr><td>Damage_taken_events_dread_thorns</td><td><a href='$log#$Damage_taken_events_dread_thorns'>DMG Taken DreadThorns</a></td><tr>";
echo "<tr><td>Damage_done_entangling_roots</td><td><a href='$log#$Damage_done_entangling_roots'>Focus DMG EntanglingRoots</a></td><tr>";
}
echo '</table>';

?>