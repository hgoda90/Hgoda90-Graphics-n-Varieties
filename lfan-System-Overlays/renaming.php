
<?php
$system = ["Arcade", "Atari -- Atari 2600", "Atari -- Atari 5200", "Atari -- Atari 7800", "Atari -- Atari Jaguar", "ColecoVision", "DOSBox", "FB Neo", "Mattel -- Intellivision", "Microsoft -- MSX", "NEC -- PC Engine", "NEC -- PC Engine CD", "NEC -- SuperGrafx", "NEC -- TurboGrafx CD", "NEC -- TurboGrafx-16", "Nintendo -- Famicom", "Nintendo -- Famicom Disk System", "Nintendo -- Gamecube", "Nintendo -- Nintendo 64", "Nintendo -- NES", "Nintendo -- Super Famicom", "Nintendo -- Super Gameboy", "Nintendo -- Super Nintendo", "Nintendo -- Wii", "Panasonic -- 3DO", "Philips -- CD-i", "Sammy -- Atomiswave", "Sega -- 32x", "Sega -- Dreamcast", "Sega -- Genesis", "Sega -- Mark III", "Sega -- Master System", "Sega -- Mega Drive", "Sega -- Naomi", "Sega -- Sega CD", "Sega -- Sega CD + 32x", "Sega -- Sega Saturn", "Sega -- SG-1000", "SNK -- Neo Geo AES", "SNK -- Neo Geo CD", "SNK -- Neo Geo MVS", "Sony -- PlayStation", "Sony -- PlayStation 2"];
$style = ["Frame Bezel -- 4x3", "Frame Bezel -- Full", "Frameless Bezel", "lfan Bezel", "Standard Bezel", "TV Bezel", "TV Bezel 2", "Wide Frame"];

for($i=0;$i<count($system);$i++){
	$dir = $system[$i];

	for($s=0;$s<count($style);$s++){
		
		$color = glob("$dir/$style[$s]/*.slangp");
		
		for($c=0;$c<count($color);$c++){
			$color2 = str_replace(".slangp", "", str_replace($dir, "", str_replace("/$style[$s]/", "", $color[$c])));
			$color3 = str_replace("-[Night]", "", $color2);
			
			if(!is_dir("$dir/$color3/")){
				mkdir("$dir/$color3/");
			}
			
			if(strpos($color2, "-[Night]") > 0){
				rename("$dir/$style[$s]/$color2.slangp", "$dir/$color3/$style[$s]-[Night].slangp");
				echo $dir."/".$style[$s]."/".$color2.".slangp Moved<br />";
			}
			else{
				rename("$dir/$style[$s]/$color2.slangp", "$dir/$color2/$style[$s].slangp");
				echo $dir."/".$style[$s]."/".$color2.".slangp Moved<br />";
			}
		}
		
		rmdir("$dir/$style[$s]/");
	}
}
?>