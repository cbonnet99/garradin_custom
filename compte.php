<?php


$nbr_guideur = array(
17 => 0,
16 => 0,
15 => 0,
14 => 0,
13 => 0,
12 => 0,
11 => 0,
10 => 0,
9 => 0,
8 => 0,
7 => 0,
6 => 0,
5 => 0,
4 => 0,
3 => 0,
2 => 0,
1 => 0,
0 => 0
);

$nbr_guide = array(
17 => 0,
16 => 0,
15 => 0,
14 => 0,
13 => 0,
12 => 0,
11 => 0,
10 => 0,
9 => 0,
8 => 0,
7 => 0,
6 => 0,
5 => 0,
4 => 0,
3 => 0,
2 => 0,
1 => 0,
0 => 0
);

$nbr_guideur_pre = array(
	17 => 0,
	16 => 0,
	15 => 0,
	14 => 0,
	13 => 0,
	12 => 0,
	11 => 0,
	10 => 0,
	9 => 0,
	8 => 0,
	7 => 0,
	6 => 0,
	5 => 0,
	4 => 0,
	3 => 0,
	2 => 0,
	1 => 0,
	0 => 0
	);
	
$nbr_guide_pre = array(
	17 => 0,
	16 => 0,
	15 => 0,
	14 => 0,
	13 => 0,
	12 => 0,
	11 => 0,
	10 => 0,
	9 => 0,
	8 => 0,
	7 => 0,
	6 => 0,
	5 => 0,
	4 => 0,
	3 => 0,
	2 => 0,
	1 => 0,
	0 => 0
	);
	
//recherche
$query='select id, id_categorie, nom, cours, guidage, guidage_exception from membres';
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($query);

define(CATEGORY_MEMBRE_ACTIF, 1);
define(CATEGORY_ADMIN, 3);
define(CATEGORY_ACCUEIL, 5);

foreach($result as $row) {

				//test est inscrit au cours
				$cours_binaire=decbin($row[cours]);
				$cours_binaire=str_pad($cours_binaire, 17, "0", STR_PAD_LEFT);
				$cours_binaire = strrev($cours_binaire);
				//echo $cours_binaire.'<br>';
				//echo $row[nom].' '.$row[guidage].' '.$row[guidage_exception].'<br>';

				$guidage_exception_binaire=decbin($row[guidage_exception]);
				$guidage_exception_binaire=str_pad($guidage_exception_binaire, 17, "0", STR_PAD_LEFT);
				$guidage_exception_binaire = strrev($guidage_exception_binaire);

				for($id_cours=0;$id_cours<=17;$id_cours++){

					$utilisateur_inscrit_au_cours = (substr($cours_binaire, $id_cours, 1)=="1");
					if ($utilisateur_inscrit_au_cours) {

						$is_pre_inscrit = true;

						if ($row[id_categorie]==CATEGORY_MEMBRE_ACTIF or $row[id_categorie]==CATEGORY_ADMIN or $row[id_categorie]==CATEGORY_ACCUEIL) {
							// echo '+++ presinscrit should be false';
							$is_pre_inscrit = false;

						}
						// echo '==== is_pre_inscrit===false? for '.$row[nom].': '.($is_pre_inscrit===false).'<BR>';
						// echo '==== $row[guidage_exception] '.$row[nom].': '.$row[guidage_exception].'<BR>';
						//si exception
						$utilisateur_exception_guidage_cours = (substr($guidage_exception_binaire, $id_cours, 1)=="1");
						if ($utilisateur_exception_guidage_cours) {
							// echo '+++++++++++ In EXCEPTION guidage<BR>';
							if($row[guidage]=='guideur(se)'){
								if ($is_pre_inscrit === false) {
									// echo '<td>Adding '.$row[nom].' as guidée(Exception guidage!) to count for cours'.$id_cours.'</td>';
									// echo '<br>';
									$nbr_guide[$id_cours]++;
								}
								else {
									$nbr_guide_pre[$id_cours]++;
								}
							}else{
								if ($is_pre_inscrit === false) {
									// echo '<td>Adding '.$row[nom].' as guideur(Exception guidage!) to count for cours'.$id_cours.'</td>';
									// echo '<br>';
									$nbr_guideur[$id_cours]++;
								}
								else {
									$nbr_guideur_pre[$id_cours]++;
								}
							}
						}else{
							if($row[guidage]=='guideur(se)'){
								if ($is_pre_inscrit === false) {
									// echo '<td>Adding '.$row[nom].' as guideur to count for cours'.$id_cours.'</td>';
									// echo '<br>';
									$nbr_guideur[$id_cours]++;
								}
								else {
									$nbr_guideur_pre[$id_cours]++;
								}
								
							}else{
								if ($is_pre_inscrit === false) {
									// echo '<td>Adding '.$row[nom].' as guidée to count for cours'.$id_cours.'</td>';
									// echo '<br>';
									$nbr_guide[$id_cours]++;
								}
								else {
									$nbr_guide_pre[$id_cours]++;
								}
								
							}
						}
					}
				}
			}

?>