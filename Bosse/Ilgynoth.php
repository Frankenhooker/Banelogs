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

$Damage_done_ilgynoth = "&pins=2%24Off%24%23244F4B%24damage%24-1%24105393.0.0.Boss%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_done_dominance_tentacle = "&pins=2%24Off%24%23244F4B%24damage%24-1%24105304.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_done_death_glare = "&pins=2%24Off%24%23244F4B%24damage%240%24105322.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_done_corrupter = "&pins=2%24Off%24%23244F4B%24damage%240%24105383.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_done_all_tantacles = "&pins=2%24Off%24%23909049%24damage%240%24105383.0.0.NPC%7C105322.0.0.NPC%7C105304.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_taken_events_mindflay = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Mind+Flay%22&view=events&type=damage-taken";
$Damage_taken_CursedBlood = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Cursed+Blood%22&type=damage-taken";
$Damage_taken_source_CursedBlood = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Cursed+Blood%22&by=target";
$Damage_taken_events_nightmare_explosion = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Nightmare+Explosion%22&view=events&type=damage-taken";

echo '<table class="sortable" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><th>Mechanik</th><th>Link</th></tr>';
if (isset($fight) == TRUE)
{
echo "<tr><td>Damage_done_ilgynoth</td><td><a href='$log#fight=$fight$Damage_done_ilgynoth'>FocusDMG Il'gynoth</a></td><tr>";
echo "<tr><td>Damage_done_dominance_tentacle</td><td><a href='$log#fight=$fight$Damage_done_dominance_tentacle'>FocusDMG Dominanztentakel</a></td><tr>";
echo "<tr><td>Damage_done_death_glare</td><td><a href='$log#fight=$fight$Damage_done_death_glare'>FocusDMG Deathglare</a></td><tr>";
echo "<tr><td>Damage_done_corrupter</td><td><a href='$log#fight=$fight$Damage_done_corrupter'>FocusDMG Corruptor</a></td><tr>";
echo "<tr><td>Damage_done_all_tantacles</td><td><a href='$log#fight=$fight$Damage_done_all_tantacles'>FocusDMG All Tentacles</a></td><tr>";
echo "<tr><td>Damage_taken_events_mindflay</td><td><a href='$log#fight=$fight$Damage_taken_events_mindflay'>DMG Taken Mindflay</a></td><tr>";
echo "<tr><td>Damage_taken_CursedBlood</td><td><a href='$log#fight=$fight$Damage_taken_CursedBlood'>DMG Taken CursedBlood(Event)</a></td><tr>";
echo "<tr><td>Damage_taken_source_CursedBlood</td><td><a href='$log#fight=$fight$Damage_taken_source_CursedBlood'>DMG Taken CursedBlood(Source)</a></td><tr>";
echo "<tr><td>Damage_taken_events_nightmare_explosion</td><td><a href='$log#fight=$fight$Damage_taken_events_nightmare_explosion'>DMG Taken Nightmare Explosion</a></td><tr>";

}
else
{
echo "<tr><td>Damage_done_ilgynoth</td><td><a href='$log#$Damage_done_ilgynoth'>FocusDMG Il'gynoth</a></td><tr>";
echo "<tr><td>Damage_done_dominance_tentacle</td><td><a href='$log#$Damage_done_dominance_tentacle'>FocusDMG Dominanztentakel</a></td><tr>";
echo "<tr><td>Damage_done_death_glare</td><td><a href='$log#$Damage_done_death_glare'>FocusDMG Deathglare</a></td><tr>";
echo "<tr><td>Damage_done_corrupter</td><td><a href='$log#$Damage_done_corrupter'>FocusDMG Corruptor</a></td><tr>";
echo "<tr><td>Damage_done_all_tantacles</td><td><a href='$log#$Damage_done_all_tantacles'>FocusDMG All Tentacles</a></td><tr>";
echo "<tr><td>Damage_taken_events_mindflay</td><td><a href='$log#$Damage_taken_events_mindflay'>DMG Taken Mindflay</a></td><tr>";
echo "<tr><td>Damage_taken_CursedBlood</td><td><a href='$log#$Damage_taken_CursedBlood'>DMG Taken CursedBlood(Event)</a></td><tr>";
echo "<tr><td>Damage_taken_source_CursedBlood</td><td><a href='$log#$Damage_taken_source_CursedBlood'>DMG Taken CursedBlood(Source)</a></td><tr>";
echo "<tr><td>Damage_taken_events_nightmare_explosion</td><td><a href='$log#$Damage_taken_events_nightmare_explosion'>DMG Taken Nightmare Explosion</a></td><tr>";

}
echo '</table>';

?>