<?php

include 'compte.php';


$table_cours = array(
	0 => 'COURS TECHNIQUE Hommes - César AGAZZI - lundi 12h30',
	1 => 'PARCOURS 2 TANGO - Anne-Marie & Patrice - lundi 19h00',
	2 => 'PARCOURS 2&3 MILONGA - Anne-Marie & Patrice - lundi 20h00',
	3 => 'PARCOURS 2 - Daniel et Marlène - lundi 21h00',
	4 => 'PARCOURS 3 - Xavier & Florence - lundi 21h00',
	5 => 'PARCOURS 1 1ère année - Leslie & Guilhem - mardi 19h00',
	6 => 'PARCOURS 1 2nde année - Leslie & Guilhem - mardi 20h00',
	7 => 'PARCOURS 2 - Leslie & Guilhem - mardi 21h00',
	8 => 'PARCOURS 1 1ère année - Virginia & César - mercredi 19h30',
	9 => 'PARCOURS 1 2nde année - Virginia & César - mercredi 20h30',
	10 => 'COURS TECHNIQUE - Virginia & César - mercredi 21h30',
	11 => 'PARCOURS 1 1ère année - Pablo AGUDIO - mercredi 20h30',
	12 => 'PARCOURS 1 1ère année - Pablo AGUDIO - jeudi 19h00',
	13 => 'PARCOURS 1 2nde année - Pablo AGUDIO - jeudi 20h00',
	14 => 'PARCOURS 2 - César & Virginia - jeudi 19h00',
	15 => 'PARCOURS 3 - Virginia & César - jeudi 20h00',
	16 => 'COURS TECHNIQUE Femmes - Virginia UVA - vendredi 12h30'	
);

$limite=18;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>Synthèse des cours</title>
  </head>
  <body>

 			<?php 
			for($i=0;$i<=16;$i++){
				echo '<h3>'.$table_cours[$i].'</h3>';
				echo '<table  border="0">';
				echo '<tr><td></td><td>Guideurs/euses</td><td>Guidé.e.s</td></tr>';
				// if($nbr_guideur[$i]>=$limite){
				// 	echo '<tr><td>Inscrits: </td><td>guideur:</td><td>'.$nbr_guideur[$i].'</td><td><img style="width: 41px; height: 29px;" alt="" src="attention.png"></td></tr>';
				// }else{
					echo '<tr><td>Inscrits: </td><td>'.$nbr_guideur[$i].'</td><td>'.$nbr_guide[$i].'</td></tr>';
				// }
					echo '<tr><td>Pré-inscrits: </td><td>'.$nbr_guideur_pre[$i].'</td><td>'.$nbr_guide_pre[$i].'</td></tr>';
				echo '</table>';
			}
			?>
     

  </body>
</html>

