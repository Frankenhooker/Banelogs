<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"/>

    <title>Banelogs</title>
<link href="banelogs.css" rel="stylesheet"></head>
<?php

$path = "logs.banelings.de";
$log = $_GET["log"];

$public_api_key = "79558223d2ecf04879a75f44d61866d0";

$log_code = str_replace("https://www.warcraftlogs.com/reports/","","$log");

$json_log = file_get_contents("https://www.warcraftlogs.com:443/v1/report/fights/$log_code?api_key=$public_api_key");

$data = json_decode($json_log, TRUE);

function SearchHealpotSources($json_event_log, $fights_data){
$array_sources = array("");
$data_events = json_decode($json_event_log, TRUE);
$array_events = $data_events['events'];
$array_events_length = count($array_events);

$array_friendlies = $fights_data['friendlies'];
$array_friendlies_length = count($array_friendlies);

for ($i = 0; $i < $array_events_length; $i++)
{
	$userID	= $array_events[$i]['sourceID'];
	for ($ii = 0; $ii < $array_friendlies_length; $ii++)
	{
		if ($userID === $array_friendlies[$ii]['id'])
		{
			$name = $array_friendlies[$ii]['name'];
			$array_sources_new = array("$name");
			$array_sources = array_merge($array_sources, $array_sources_new);
		}
	}
}
return $array_sources;
}

/*function SearchDamagepotSources($data_events){
$data_events = json_decode($json_event_log, TRUE);
$array_events = $data_events['events'];
$array_events_length = count($array_events);

for ($i = 0; $i < $array_events_length; $i++)
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
}
return;
}*/

$time_start = $data['start'];
$time_end = $data['end'];

$array_fights = $data['fights'];

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator($array_fights),
    RecursiveIteratorIterator::SELF_FIRST);

//Extra Pins
$Pin_healing = '(ability.name = "Ancient Healing Potion" OR ability.name = "Shieldtronic Shield" OR ability.name = "Ancient Rejuvenation Potion") AND type = "cast"';
$Pin_healing = urlencode($Pin_healing);
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
echo '<div class="container">
    <h1>Banelogs&trade;</h1>
    <div class="input-group">
        <input type="text" class="input search wide" placeholder="Search..."/>
    </div>';
foreach ($jsonIterator as $key => $val) {
    if(is_array($val))
	{
		$id   = $val['id'];
		$boss = $val['boss'];
		$name = $val['name'];

        if ($boss != 0)
		{
			$difficulty = $val['difficulty'];
			$time_start = $val['start_time'];
			$time_end   = $val['end_time'];
			$json_heal = file_get_contents("https://www.warcraftlogs.com:443/v1/report/events/$log_code?start=$time_start&end=$time_end&filter=$Pin_healing&api_key=$public_api_key");
			$sources_healpot = SearchHealpotSources($json_heal, $data);

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

			echo "<div class='accordion'><header class='trigger'>$name ($difficulty)<div class='right'><button onclick='location.href=\"$log#fight=$id\"' class='button outline'>Show Log</button></div></header><main><div class='content'>";

			switch ($name)
			{
				case "Ursoc":
				echo "<TABLE BORDER='1' CELLPADDING='3' CELLSPACING='3'>
						<TD><a href='$log#fight=$id$Damage_taken_events_Momentum'>Wer hat den Charge abgefangen?</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_rend_overwhelm'>Tank Debuff (Rend Flesh & Overwhelm)</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_miasma'>Damage Taken Miasma(Heroic&Mythic)</a></TD></TABLE>";
						echo "<TABLE><TR><TD>Defensive Pots:";
						$sources_healpot_length = count($sources_healpot);
						for ($ii = 0; $ii < $sources_healpot_length; $ii++)
						{
							$source_healpot = $sources_healpot[$ii];
							echo "$source_healpot ";
						}
            echo "</TD></TR>";
						echo "<TR><TD>Offensive Pots:</TD></TR></TABLE>";
				break;
				case "Ilgynoth":
				echo "<TABLE BORDER='1' CELLPADDING='3' CELLSPACING='3'>
						<TD><a href='$log#fight=$id$Damage_done_ilgynoth'>FocusDMG Il'gynoth</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_dominance_tentacle'>FocusDMG Dominanztentakel</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_death_glare'>FocusDMG Deathglare</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_corrupter'>FocusDMG Corruptor</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_all_tantacles'>FocusDMG All Tentacles</a></TD>
						<TR>
						<TD><a href='$log#fight=$id$Damage_taken_events_mindflay'>DMG Taken Mindflay</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_CursedBlood'>DMG Taken CursedBlood(Event)</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_source_CursedBlood'>DMG Taken CursedBlood(Source)</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_nightmare_explosion'>DMG Taken Nightmare Explosion</a></TD>
						</TR>";
						echo "<TABLE><TR><TD>Defensive Pots:";
						$sources_healpot_length = count($sources_healpot);
						for ($ii = 0; $ii < $sources_healpot_length; $ii++)
						{
							$source_healpot = $sources_healpot[$ii];
							echo "$source_healpot ";
						}
						echo "</TD></TR>
						<TR><TD WIDTH='150'>Offensive Pots:</TD></TR>
						</TABLE>";
				break;
				case "Cenarius":
				echo "<TABLE BORDER='1' CELLPADDING='3' CELLSPACING='3'>
						<TD><a href='$log#fight=$id$Damage_taken_creeping_nightmare'>DMG Taken Creeping Nightmares</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_rotten_breath'>DMG Taken RottenBreath</a></TD>
						<TD><a href='$log#fight=$id$Damage_taken_events_dread_thorns'>DMG Taken DreadThorns</a></TD>
						<TD><a href='$log#fight=$id$Damage_done_entangling_roots'>Focus DMG EntanglingRoots</a></TD>";
						echo "<TABLE><TR><TD>Defensive Pots:";
						$sources_healpot_length = count($sources_healpot);
						for ($ii = 0; $ii < $sources_healpot_length; $ii++)
						{
							$source_healpot = $sources_healpot[$ii];
							echo "$source_healpot ";
						}
						echo "</TD></TR>;
						<TR><TD WIDTH='150'>Offensive Pots:</TD></TR>
						</TABLE>";
				break;
				default:
				echo "<tr data-expandable='expandable-$i'><td colspan='3'>More information soon...</td></tr>";
			}
			$i++;
			echo '</div></main></div>';
		}
    } else if($key === "boss") {
        //echo "$key=$val\n ";
    }
}
?>
</div>
<script type="text/javascript" src="banelogs.js"></script>
</body>
</html>