<?php
	putenv('GDFONTPATH=' . realpath('.'));
	header("Content-Type: image/png");
	
//stats
	include_once('HypixelPHP.php');
	$HypixelPHP = new HypixelPHP\HypixelPHP(['api_key' => '########-####-####-####-############']);
	$username = $_GET['name'];
	$player = $HypixelPHP->getPlayer(['name' => $username]);
	$stat = "idk probs lots of stats";
	if ($player != null) {
		$num = rand(0, 24);
		
		switch($num) {
			case 0:
				$full = $player->getRaw();
				$autoSpawnPet = $full['record']['settings']['autoSpawnPet'];
				if ($autoSpawnPet) {$stat = 'I have my pet set to automatically spawn';} 
				else {$stat = 'My pet wont spawn when I join lobbies';}
				break;
			case 1:
				$hints = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->get('hints',0);
				if ($hints) {$stats = 'I have hints turned on in The Blocking Dead';} 
				else {$stat = 'I have hints turned off in The Blocking Dead';}
				break;
			case 2:
				$dam = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->get('damage_prevented_paladin',0);
				if ($dam==null) {$dam = 0;}
				$stat = 'I have prevented '.$dam.' damage with paladin in WarLords';
				break;
			case 3:
				$vote = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->get('votes_Caelum v2',0);
				if ($vote==null) {$stat = 'I have not voted for Caelum v2 in Blitz';}
				else {$stat = 'I voted for Caelum v2 in Blitz';}
			case 4:
				$reload = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::MCGO)->get('shotgun_reload_speed_reduction',0);
				if ($reload==null) {$reload=0;}
				if ($reload==0) {$stat = 'I have not reduced my shotgun reload speed in CvC';}
				else {$stat = 'My shotgun reload speed reduction is upgraded to '.$reload.' in CvC';}
				break;
			case 5:
				$respawn = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::QUAKE)->get('instantRespawn',0);
				if ($respawn==null) {$respawn=0;}
				if ($respawn) {$stat = 'I have instant respawning turned on in QuakeCraft';} 
				else {'I have instant respawn turned off in QuakeCraft';}
				break;
			case 6:
				$heads = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::UHC)->get('heads_eaten',0);
				if ($heads==null) {$heads=0;}
				if ($stat==1) {$stat = 'I have eaten '.$heads.' head in UHC';} 
				else {$stat = 'I have eaten '.$heads.' heads in UHC';}
				break;
			case 7:
				$blood = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->get('blood',0);
				if ($blood==null) {$blood=1;}
				if ($blood) {$stat = 'I have blood turned off in MegaWalls';} 
				else {$stat = 'I have blood turned on in MegaWalls';}
				break;
			case 8:
				$box = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::GINGERBREAD)->get('box_pickups_canyon',0);
				if ($box==null) {$box=0;}
				if ($box==1) {$stat = 'I have picked up '.$box.' box on Canyon in TKR';} 
				else {$stat = 'I have picked up '.$box.' boxes on Canyon in TKR';}
				break;
			case 9:
				$deaths = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->get('deaths_kit_defending_team_baseball-player',0);
				if ($deaths==null) {$deaths=0;}
				if ($deaths==1) {$stat = 'In SkyWars, I have died '.$deaths.' time to a BaseBall Player in teams';} 
				else {$stat = 'In SkyWars, I have died '.$deaths.' times to a BaseBall Player in teams';}
				break;
			case 10:
				$shot = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::TRUE_COMBAT)->get('arrows_shot',0);
				if ($shot==null) {$shot=0;}
				if ($shot==1) {$stat = 'In Crazy Walls, I shot '.$shot.' arrow';} 
				else {$stat = 'In Crazy Walls, I shot '.$shot.' arrows';}
				break;
			case 11:
				$quit = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SUPER_SMASH)->get('quits',0);
				if ($quit==null) {$quit=0;}
				if ($quit==1) {$stat = 'In Smash Heroes, I have left the game before the end '.$quit.' time';} 
				else {$stat = 'In Smash Heroes, I have left the game before the end '.$quit.' times';}
				break;
			case 12:
				$full = $player->getRaw();
				$fw = $full['record'];
				if (count($fw)>0) {
					$fw = $fw['fireworkStorage'];
					if (count($fw)>0) {$fw = $fw[0];} 
					else {$fw=null;}
				} else {$fw=null;}
				if ($fw==null) {$stat = 'I dont have any fireworks';} 
				else {$stat = 'My firework 0 is set to flight duration '.$fw['flight_duration'];}
				break;
			case 13:
				$full = $player->getRaw();
				$quest = $full['record']['quests']['space_mission'];
				if (count($quest)>0) {$quest = $quest['active'];} 
				else {$quest=null;}
				if ($quest==null) {$stat = 'I do not have the Space Mission quest activated';} 
				else {$stat = 'I have the Space Mission quest activated';}
				break;
			case 14:
				$stamp = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::ARCADE)->get('stamp_level',0);
				if ($stamp==null) {$stamp=0;}
				$stat = "I don't know what 'stamp_level' is, but mine is upgraded to ".$stamp;
				break;
			case 15:
				$repair = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::BATTLEGROUND)->get('repaired_rare',0);
				if ($repair==null) {$repair=0;}
				if ($repair==1) {$stat = 'I have repaired '.$repair.' rare weapon in WarLords';} 
				else {$stat = 'I have repaired '.$repair.' rare weapons in WarLords';}
				break;
			case 16:
				$aura = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::HUNGERGAMES)->get('aura',0);
				if ($aura==null) {$stat = 'I do not have an aura set in Blitz';} 
				else {$stat = 'I have the aura '.ucwords(str_replace('_',' ',strtolower($aura))).' in Blitz';}
				break;
			case 17:
				$recoil = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::MCGO)->get('magnum_recoil_reduction',0);
				if ($recoil==null) {$recoil=0;}
				if ($recoil==0) {$stat = 'In CvC, I have not reduced my magnum recoil';}
				else {$stat = 'In CvC, My magnum recoil reduction is upgraded to '.$recoil;}
				break;
			case 18:
				$sf = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::PAINTBALL)->get('shots_fired',0);
				$wins = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::PAINTBALL)->get('wins',0);
				if ($sf==null) {$sf=0;} if ($wins==null) {$wins=0;}
				if ($wins==0) {$stat = 'My shots fired to win ratio in PaintBall is ∞';} 
				else {$stat = 'My shots fired to win ratio in PaintBall is '.round($sf/$wins,2);}
				break;
			case 19:
				$full = $player->getRaw();
				$cons = $full['record']['petConsumables'];
				if (array_key_exists('CARROT_ITEM',$cons)) {$cons = $cons['CARROT_ITEM'];} 
				else {$cons=null;}
				if ($cons==null) {$stat = 'I do not have any carrots';
				} else {
					if ($cons==1) {$stat = 'I have '.$cons.' carrot';} 
					else {$stat = 'I have '.$cons.' carrots';}
				}
				break;
			case 20:
				$full = $player->getRaw();
				if (array_key_exists('REWARD_FIND_SLIKEY',$full['record'])) {
					if ($full['record']['REWARD_FIND_SLIKEY']==true) {$stat = 'I have found Slikey';} 
					else {$stat = 'I have not found Slikey';}
				} else {$stat = 'I have not found Slikey';}
				break;
			case 21:
				$broke = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->get('blocks_broken',0);
				if ($broke==null) {$broke=0;}
				if ($broke==0) {$stat = 'I have not broken any blocks in SkyWars';}
				elseif ($broke==1) {$stat = 'I have broken '.$broke.' block in SkyWars';}
				else {$stat = 'I have broken '.$broke.' blocks in SkyWars';}
				break;
			case 22:
				$placed = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->get('blocks_placed',0);
				if ($placed==null) {$placed=0;}
				$kills = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->get('kills',0);
				if ($kills==null) {$kills=0;}
				if ($kills==0) {$stat = 'I average ∞ blocks placed for every kill in SkyWars';} 
				elseif (round($placed/$kills,2)==1) {$stat = 'I average '.round($placed/$kills,2).' block placed for every kill in SkyWars';} 
				else {$stat = 'I average '.round($placed/$kills,2).' blocks placed for every kill in SkyWars';}
				break;
			case 23:
				$eggs = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::SKYWARS)->get('egg_thrown',0);
				if ($eggs==null) {$eggs=0;}
				if ($eggs==0) {$stat = 'I have not thrown any eggs in SkyWars';}
				elseif ($eggs==1) {$stat = 'I have thrown '.$eggs.' egg in SkyWars';}
				else {$stat = 'I have thrown '.$eggs.' eggs in SkyWars';}
				break;
			case 24:
				$vis = $player->getStats()->getGameFromID(\HypixelPHP\GameTypes::WALLS3)->get('mutations_visibility',0);
				if ($vis==null) {$vis==false;}
				if ($vis==true) {$stat = 'I have mutation visibility turned off in MegaWalls';}
				else {$stat = 'I have mutation visibility turned on in MegaWalls';}
			default:
				$stat = 'idk. stats go here or something';
		}
	}
	
//image
	$imgsz = imagettfbbox(20, 0, 'arial.ttf', $stat);
	$imgw = $imgsz[2]+5; $imgh =27;
	$imagecontainer = imagecreatetruecolor($imgw,$imgh);
	imagesavealpha($imagecontainer, true);
	
	$alphacolor = imagecolorallocatealpha($imagecontainer, 0, 0, 0, 127);
	imagefill($imagecontainer,0,0,$alphacolor);
	
	$black = imagecolorallocate($imagecontainer,0,0,0);
	$gray = imagecolorallocate($imagecontainer,200,200,200);
	
	imagettftext($imagecontainer, 20, 0, 1, 21, $gray, 'arial.ttf', $stat);
	imagettftext($imagecontainer, 20, 0, 0, 20, $black, 'arial.ttf', $stat);
	
	imagepng($imagecontainer);
	imagedestroy($imagecontainer);
?>