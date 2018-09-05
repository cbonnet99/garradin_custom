<?php

include 'compte.php';


$table_cours = array(
17 => 'PARCOURS 2 TANGO - Anne-Marie & Patrice - lundi 19h00',
16 => 'PARCOURS 2&3 MILONGA - Anne-Marie & Patrice - lundi 20h00',
15 => 'PARCOURS 3 - Xavier & Florence - lundi 21h30',
14 => 'PARCOURS 1 1ère année - Daniel et Marlène - lundi 20h00',
13 => 'PARCOURS 1 1ère année - Leslie & Guilhem - mardi 19h00',
12 => 'PARCOURS 1 2nde année - Leslie & Guilhem - mardi 20h00',
11 => 'PARCOURS 2 - Leslie & Guilhem - mardi 21h00',
10 => 'PARCOURS 2 & 3 Technique Couple - Virginia & César - mercredi 12h30',
9 => 'PARCOURS 1 1ère année - Virginia & César - mercredi 19h30',
8 => 'PARCOURS 1 2nde année - Virginia & César - mercredi 20h30',
7 => 'PARCOURS 2 - Virginia & César César - mercredi 21h30',
6 => 'PARCOURS 1 1ère année - Pablo AGUDIO - mercredi 20h30',
5 => 'PARCOURS 2&3 Technique Femme-Homme - César & Virginia - jeudi 19h00',
4 => 'PARCOURS 3 - Virginia & César - jeudi 20h00',
3 => 'PARCOURS 1 1ère année - Pablo AGUDIO - jeudi 20h00',
2 => 'PARCOURS 2&3 Technique Femme-Homme - César & Virginia - vendredi 12h30',
1 => 'PARCOURS 1 1ère année - Daniel - samedi 10h00',
0 => 'PARCOURS 1 2nde année - Daniel - samedi 11h00'
);

$limite=18;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title></title>
  </head>
  <body>

 			<?php 
			for($i=0;$i<=17;$i++){
				echo '<h3>'.$table_cours[$i].'</h3>';
				echo '<table  border="0">';
				if($nbr_guideur[$i]>=$limite){
					echo '<tr><td>guideur:</td><td>'.$nbr_guideur[$i].'</td><td><img style="width: 41px; height: 29px;" alt="" src="attention.png"></td></tr>';
				}else{
					echo '<tr><td>guideur:</td><td>'.$nbr_guideur[$i].'</td><td></td></tr>';
				}
				if($nbr_guide[$i]>=$limite){
					echo '<tr><td>guidé:</td><td>'.$nbr_guide[$i].'</td><td><img style="width: 41px; height: 29px;" alt="" src="attention.png"></td></tr>';
				}else{
					echo '<tr><td>guidé:</td><td>'.$nbr_guide[$i].'</td><td></td></tr>';
				}
				echo '</table>';
			}
			?>
     

  </body>
</html>

