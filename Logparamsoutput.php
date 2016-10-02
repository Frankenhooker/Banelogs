<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<style type="text/css">
[data-expand] {
  cursor: pointer;
}

table thead{
	background-color:#eee;
	color:#666666;
	font-weight: bold;
	cursor: default;
	text-align: left;
}

[data-expandable] td{
  background-color:#eee;
  color:#666666;
  font-weight: bold;
  transition: padding .1s ease-in-out;
  will-change: padding;
  line-height: 0 !important;
  padding: 0 8px !important;
  overflow: hidden;
  border: 1px solid #dddddd;
  text-align: left;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
[data-expandable].active td{
  transition: padding .1s ease-in-out;
  will-change: padding;
  line-height: normal !important;
  padding: 8px !important;
}
</style>
</head>
<?php

$path = "logs.banelings.de";
$log = $_GET["log"];

$public_api_key = "79558223d2ecf04879a75f44d61866d0";

$log_code = str_replace("https://www.warcraftlogs.com/reports/","","$log");

$json_log = file_get_contents("https://www.warcraftlogs.com:443/v1/report/fights/$log_code?api_key=$public_api_key");
//$json_event_log = file_get_contents("https://www.warcraftlogs.com:443/v1/report/events/rC9DQxWtwHmckFMa?start=999454&end=1221859&filter=%28ability.name%20%3D%20%22Potion%20of%20Deadly%20Grace%22%20AND%20type%20%3D%20%22applybuff%22%29%20OR%20%28ability.name%20%3D%20%22Potion%20of%20Deadly%20Grace%22%20AND%20type%20%3D%20%22removebuff%22%29&api_key=$public_api_key");

$data = json_decode($json_log, TRUE);
//$data_events = json_decode($json_event_log, TRUE);

//$array_events = $data_events['events'];
//$array_events_length = count($array_events);

/*for ($i = 0; $i < $array_events_length; $i++)
{
	$userID		= $array_events[$i]['sourceID'];
	$type		= $array_events[$i]['type'];
	$timestamp	= $array_events[$i]['timestamp'];
	$time		= $timestamp - 999454;
	if ($type === "applybuff")
	{
		echo "$userID $type $time<br>";
	}else if($type === "removebuff" && $time < 30000)
	{
		echo "$userID $type $time<br>";
	}
}  */

$time_start = $data['start'];
$time_end = $data['end'];

$array_fights = $data['fights'];

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator($array_fights),
    RecursiveIteratorIterator::SELF_FIRST);

//Ursoc
$Damage_taken_events_Momentum = "&type=damage-taken&ability=198099&view=events";
$Damage_taken_events_rend_overwhelm = "&pins=2%24Off%24%23909049%24expression%24ability.name+%3D+%22Rend+Flesh%22+and+type+%3D+%22applydebuff%22+and+target.type+%3D+%22player%22%5E2%24Off%24%23909049%24expression%24ability.name+%3D+%22Overwhelm%22+and+type+%3D+%22applydebuff%22+and+target.type+%3D+%22player%22&view=events&spells=debuffs";
$Damage_taken_events_miasma = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Miasma%22&view=events&type=damage-taken";
//Il'gynoth
$Damage_done_ilgynoth = "&pins=2%24Off%24%23244F4B%24damage%24-1%24105393.0.0.Boss%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_done_dominance_tentacle = "&pins=2%24Off%24%23244F4B%24damage%24-1%24105304.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_done_death_glare = "&pins=2%24Off%24%23244F4B%24damage%240%24105322.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_done_corrupter = "&pins=2%24Off%24%23244F4B%24damage%240%24105383.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_done_all_tantacles = "&pins=2%24Off%24%23909049%24damage%240%24105383.0.0.NPC%7C105322.0.0.NPC%7C105304.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&type=damage-done";
$Damage_taken_events_mindflay = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Mind+Flay%22&view=events&type=damage-taken";
$Damage_taken_CursedBlood = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Cursed+Blood%22&type=damage-taken";
$Damage_taken_source_CursedBlood = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Cursed+Blood%22&by=target";
$Damage_taken_events_nightmare_explosion = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Nightmare+Explosion%22&view=events&type=damage-taken";
//Cenarius
$Damage_taken_creeping_nightmare = "&ability=210279&type=damage-taken";
$Damage_taken_events_rotten_breath = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Rotten+Breath%22&view=events&type=damage-taken";
$Damage_taken_events_dread_thorns = "&pins=2%24Off%24%23244F4B%24expression%24ability.name+%3D+%22Dread+Thorns%22&type=damage-taken";
$Damage_done_entangling_roots = "&pins=2%24Off%24%23244F4B%24damage%240%24108040.0.0.NPC%240.0.0.Any%24true%240.0.0.Any%24true%240&view=events";
	
$id = 0;
$i = 1;
echo '<body>';
echo '<div class="container">';	
echo '<table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0"><thead><tr><th>ID</th><th>Boss</th><th>Schwierigkeitsgrad</th></tr></thead>';
echo '<tbody>';
foreach ($jsonIterator as $key => $val) {
    if(is_array($val))
	{
		$id   = $val['id'];
		$boss = $val['boss'];
		$name = $val['name'];
		
        if ($boss != 0)
		{
			$difficulty = $val['difficulty'];
			switch ($name)
			{
				case "Elerethe Renferal":
				$name = "Elerethe";
				break;
				case "Il'gynoth, The Heart of Corruption":
				$name = "Ilgynoth";
				break;
				default:
			}
			switch ($difficulty)
			{
				case "2":
				$difficulty = "lfr";
				break;
				case "3":
				$difficulty = "normal";
				break;
				case "4":
				$difficulty = "heroic";
				break;
				case "5":
				$difficulty = "mythic";
				break;
				default:
				$difficulty = "nicht ermittelbar";
			}
			echo "<tr data-expand='expandable-$i'><td>$id</td><td><a href='$path/Bosse/$name.php?log=$log&fight=$id'>$name</a></td><td>$difficulty</td></tr>";
			switch ($name)
			{
				case "Ursoc":
				echo "<tr data-expandable='expandable-$i'><td colspan='3'>";
				echo "<TABLE>
						<TD><a href='$log#fight=$id$Damage_taken_events_Momentum'>Wer hat den Charge abgefangen?</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_rend_overwhelm'>Tank Debuff (Rend Flesh & Overwhelm)</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_miasma'>Damage Taken Miasma(Heroic&Mythic)</a></TD>
						</TABLE>";
				echo "</td></tr>";
				break;
				case "Ilgynoth":
				echo "<tr data-expandable='expandable-$i'><td colspan='3'>";
				echo "<TABLE>
						<TD><a href='$log#fight=$id$Damage_done_ilgynoth'>FocusDMG Il'gynoth</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_dominance_tentacle'>FocusDMG Dominanztentakel</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_death_glare'>FocusDMG Deathglare</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_corrupter'>FocusDMG Corruptor</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_all_tantacles'>FocusDMG All Tentacles</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_mindflay'>DMG Taken Mindflay</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_CursedBlood'>DMG Taken CursedBlood(Event)</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_source_CursedBlood'>DMG Taken CursedBlood(Source)</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_nightmare_explosion'>DMG Taken Nightmare Explosion</a></TD>
						</TABLE>";
				echo "</td></tr>";
				break;
				case "Cenarius":
				echo "<tr data-expandable='expandable-$i'><td colspan='3'>";
				echo "<TABLE>
						<TD><a href='$log#fight=$id$Damage_taken_creeping_nightmare'>DMG Taken Creeping Nightmares</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_rotten_breath'>DMG Taken RottenBreath</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_dread_thorns'>DMG Taken DreadThorns</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_entangling_roots'>Focus DMG EntanglingRoots</a></TD>
						</TABLE>";
				echo "</td></tr>";
				break;
				default:
				echo "<tr data-expandable='expandable-$i'><td colspan='3'>More information soon...</td></tr>";
			}
			$i++;
		}
    } else if($key === "boss") {
        //echo "$key=$val\n ";
    }
}
?>
</tbody>
</table>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
const expandables = document.querySelectorAll('[data-expand]');

Array.from(expandables).forEach(
  el => el.addEventListener('click', expand)
);

function expand() {
  document.querySelector(
    `[data-expandable="${this.getAttribute('data-expand')}"]`
  ).classList.toggle('active');
}
</script>
</body>
</html>