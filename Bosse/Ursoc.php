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

$Damage_taken_events_Momentum = "&type=damage-taken&ability=198099&view=events";
$Damage_taken_events_rend_overwhelm = "&pins=2%24Off%24%23909049%24expression%24ability.name+%3D+%22Rend+Flesh%22+and+type+%3D+%22applydebuff%22+and+target.type+%3D+%22player%22%5E2%24Off%24%23909049%24expression%24ability.name+%3D+%22Overwhelm%22+and+type+%3D+%22applydebuff%22+and+target.type+%3D+%22player%22&view=events&spells=debuffs";
$Damage_taken_events_miasma = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Miasma%22&view=events&type=damage-taken";

echo '<table class="sortable" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><th>Mechanik</th><th>Link</th></tr>';
if (isset($fight) == TRUE)
{
echo "<tr><td>Damage_taken_events_Momentum</td><td><a href='$log#fight=$fight$Damage_taken_events_Momentum'>Wer hat den Charge abgefangen?</a></td><tr>";
echo "<tr><td>Damage_taken_events_rend_overwhelm</td><td><a href='$log#fight=$fight$Damage_taken_events_rend_overwhelm'>Tank Debuff (Rend Flesh & Overwhelm)</a></td><tr>";
echo "<tr><td>Damage_taken_events_miasma</td><td><a href='$log#fight=$fight$Damage_taken_events_miasma'>Damage Taken Miasma(Heroic&Mythic)</a></td><tr>";
}
else
{
echo "<tr><td>Damage_taken_events_Momentum</td><td><a href='$log#$Damage_taken_events_Momentum'>Wer hat den Charge abgefangen?</a></td><tr>";
echo "<tr><td>Damage_taken_events_rend_overwhelm</td><td><a href='$log#$Damage_taken_events_rend_overwhelm'>Tank Debuff (Rend Flesh & Overwhelm)</a></td><tr>";
echo "<tr><td>Damage_taken_events_miasma</td><td><a href='$log#$Damage_taken_events_miasma'>Damage Taken Miasma(Heroic&Mythic)</a></td><tr>";
}
echo '</table>';

?>