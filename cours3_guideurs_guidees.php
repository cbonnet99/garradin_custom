<?php
$id_cours = $_GET['id_cours'];
$query='SELECT id, id_categorie, date_inscription, nom, cours, guidage, guidage_exception FROM membres ORDER BY nom';
//$query='SELECT membres.id, membres.date_inscription, membres.nom, membres.cours, membres.guidage, membres.guidage_exception, cotisations_membres.id_cotisation FROM membres,cotisations_membres  WHERE membres.id=cotisations_membres.id_membre ORDER by membres.nom';

$table_guide = array();
$table_guideur = array();
$table_guide_pre = array();
$table_guideur_pre = array();



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

define(CATEGORY_MEMBRE_ACTIF, 1);
define(CATEGORY_ADMIN, 3);
define(CATEGORY_ACCUEIL, 5);

?>
     <html>
        <head>
          <meta content="text/html; charset=UTF-8" http-equiv="content-type">
          <title>Liste des guideurs/guidées</title>
        </head>
        <body>
          <p><h3><?php echo $table_cours[$id_cours] ?></h3></p>
			<?php
			foreach($result as $row) {
				
					
					//test est inscrit au cours
					$cours_binaire=decbin($row[cours]);
					$cours_binaire=str_pad($cours_binaire, 17, "0", STR_PAD_LEFT);
					$cours_binaire = strrev($cours_binaire);

					$guidage_exception_binaire=decbin($row[guidage_exception]);
					$guidage_exception_binaire=str_pad($guidage_exception_binaire, 17, "0", STR_PAD_LEFT);
					$guidage_exception_binaire = strrev($guidage_exception_binaire);
	
					$utilisateur_inscrit_au_cours = (substr($cours_binaire, $id_cours, 1)=="1");
					if ($utilisateur_inscrit_au_cours) {

						$is_pre_inscrit = true;

						if ($row[id_categorie]==CATEGORY_MEMBRE_ACTIF or $row[id_categorie]==CATEGORY_ADMIN or $row[id_categorie]==CATEGORY_ACCUEIL) {

							$is_pre_inscrit = false;

						}
					
						$utilisateur_exception_guidage_cours = (substr($guidage_exception_binaire, $id_cours, 1)=="1");
						if ($utilisateur_exception_guidage_cours) {
							if($row[guidage]=='guideur(se)'){
								if ($is_pre_inscrit===true){
									array_push($table_guide_pre, $row['nom']);
								}
								else {
									array_push($table_guide, $row['nom']);
								}
							}else{
								if ($is_pre_inscrit===true){
									array_push($table_guideur_pre, $row['nom']);
								}
								else {
									array_push($table_guideur, $row['nom']);
								}
							}
						}else{
							if($row[guidage]=='guideur(se)'){
								if ($is_pre_inscrit===true){
									array_push($table_guideur_pre, $row['nom']);
								}
								else{
									array_push($table_guideur, $row['nom']);
								}
							}else{
								if ($is_pre_inscrit===true){
									array_push($table_guide_pre, $row['nom']);
								}
								else {
									array_push($table_guide, $row['nom']);
								}
							}
						}
					}
			}
			?>
			<?php
				$counter_guideurs = 1;
				$counter_guides = 1;
			?>
			<table CELLSPACING="20">
				<tr>
					<td width='350px'><h3>Guideurs inscrits</h3></td>
					<td width='350px'><h3>Guidés inscrits</h3></td>
				</tr>
				<tr>
					<td VALIGN=TOP>
						<table border=1>
						<?php
						foreach($table_guideur as $value) {
							echo "<tr><td>".$counter_guideurs.". ".$value."</td><td width='120px'></td></tr>";
							$counter_guideurs+=1;
						}
						?>
						</table>
					</td>
					<td VALIGN=TOP>
						<table border=1>
						<?php
						foreach($table_guide as $value) {
							echo "<tr><td>".$counter_guides.". ".$value."</td><td width='120px'></td></tr>";
							$counter_guides+=1;
						}
						?>
						</table>
					</td>
				</tr>	
			</table>
			<?php
				$counter_guideurs_pre = 1;
				$counter_guides_pre = 1;
			?>
			<table CELLSPACING="20">
				<tr>
					<td width='350px'><h3>Guideurs pré-inscrits</h3></td>
					<td width='350px'><h3>Guidés pré-inscrits</h3></td>
				</tr>
				<tr>
					<td VALIGN=TOP>
						<table border=1>
						<?php
						foreach($table_guideur_pre as $value) {
							echo "<tr><td>".$counter_guideurs_pre.". ".$value."</td><td width='120px'></td></tr>";
							$counter_guideurs_pre+=1;
						}
						?>
						</table>
					</td>
					<td VALIGN=TOP>
						<table border=1>
						<?php
						foreach($table_guide_pre as $value) {
							echo "<tr><td>".$counter_guides_pre.". ".$value."</td><td width='120px'></td></tr>";
							$counter_guides_pre+=1;
						}
						?>
						</table>
					</td>
				</tr>	
			</table>

	
		</body>
	</html>
