<?php
$id_cours = $_GET['id_cours'];
$query='SELECT id, date_inscription, nom, cours, guidage, guidage_exception FROM membres ORDER BY nom';
//$query='SELECT membres.id, membres.date_inscription, membres.nom, membres.cours, membres.guidage, membres.guidage_exception, cotisations_membres.id_cotisation FROM membres,cotisations_membres  WHERE membres.id=cotisations_membres.id_membre ORDER by membres.nom';

$nbr_guideur=0;
$nbr_guide=0;
$table_guide = array();
$table_guideur = array();



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

$table_cotis = array(
1 => 'Adhésion',
3 => 'Adhésion tarif réduit',
2 => 'Adhésion tarif couple',
4 => 'Forfait annuel (1 cours) PROMO',
5 => 'Forfait annuel (1 cours) réduit PROMO',
6 => 'Forfait annuel (2 cours) PROMO',
7 => 'Forfait annuel (2 cours) réduit PROMO',
8 => 'Forfait annuel (3 cours dt 1 Technique) PROMO',
9 => 'Forfait annuel (3 cours dt 1 Technique) réduit PROMO',
10 => 'Forfait Passion (3 a 5 cours) PROMO',
11 => 'Forfait Passion (3 a 5 cours) réduit PROMO',
11 => '10 cours (validité 1 saison)',
12 => 'Forfait MILONGA',
13 => 'Forfait Milonga gratuit',
14 => 'Gratuité'
);

	
//recherche
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($query);



?>
     <html>
        <head>
          <meta content="text/html; charset=UTF-8" http-equiv="content-type">
          <title>Liste des inscrits</title>
        </head>
        <body>
          <p><h3><?php echo $table_cours[$id_cours] ?></h3></p>
			<table border=1>
			<?php
			foreach($result as $row) {
					
					$query2='SELECT id_membre, id_cotisation FROM cotisations_membres  WHERE id_membre='.$row[id];
					$result2 = $file_db->query($query2);
					$cotis='<i>';
					foreach($result2 as $row2) {
						if($row2[id_cotisation]<>2 and $row2[id_cotisation]<>3 and $row2[id_cotisation]<>1){
							$cotis = $cotis.'<br>'.$table_cotis[$row2[id_cotisation]];
						}
					}
					$cotis = $cotis.'</i>';	
					if ($cotis=='<i></i>'){
						$cotis='<br><font color="red"><i>pas de forfait</i></font>';
					}
				
					
					//test est inscrit au cours
					$tutu=decbin($row[cours]);
					$tutu=str_pad($tutu, 17, "0", STR_PAD_LEFT);
					$tutu = strrev($tutu);
					// echo 'Membre ID: '.$row[id];
					// echo ', cours: '.$tutu;
					// echo ', id_cours: '.$id_cours;
					// echo ', Test: '.substr($tutu, $id_cours, 1);
					// echo '<br>';
					
					if(substr($tutu, $id_cours, 1)=="1"){
					
						echo '<tr>';
						echo '<td>'.$row[nom].'</td>';
						//si exception
						if ($row[guidage_exception] != null && $row[guidage_exception]==$cours){
							if($row[guidage]=='guideur(se)'){
								echo '<td>guidé(e)</td>';
								$nbr_guide = $nbr_guide+1;
								array_push($table_guide, $row['nom'].' '.$cotis);
								}else{
								echo '<td>guideur(se)</td>';
								$nbr_guideur = $nbr_guideur+1;
								array_push($table_guideur, $row['nom'].' '.$cotis);
							}
						}else{
							echo '<td>'.$row[guidage].'</td>';
							if($row[guidage]=='guideur(se)'){
								$nbr_guideur = $nbr_guideur+1;
								array_push($table_guideur, $row['nom'].' '.$cotis);
								}else{
								$nbr_guide = $nbr_guide+1;
								array_push($table_guide, $row['nom'].' '.$cotis);
								}
						}
						echo '<td>'.$row[guidage_exception].'</td>';
						echo '<td>'.$row[date_inscription].'</td>';
						echo '</tr>';
					}
			}
			?>
			</table>
			<?php echo $nbr_guideur ?> guideurs(se)<br>
			<?php echo $nbr_guide ?> guidé(e)<br><br>	
		</body>
	</html>
