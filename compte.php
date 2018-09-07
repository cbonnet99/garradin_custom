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
$query='select id, nom, cours, guidage, guidage_exception from membres';
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($query);

foreach($result as $row) {

				//test est inscrit au cours
				$tutu=decbin($row[cours]);
				$tutu=str_pad($tutu, 17, "0", STR_PAD_LEFT);
				$tutu = strrev($tutu);
				//echo $tutu.'<br>';
				//echo $row[nom].' '.$row[guidage].' '.$row[guidage_exception].'<br>';

				for($id_cours=0;$id_cours<=17;$id_cours++){

				
					if(substr($tutu, $id_cours, 1)=="1"){

						$query2='SELECT id_membre, id_cotisation FROM cotisations_membres  WHERE id_membre='.$row[id];
						$result2 = $file_db->query($query2);
						$inscrit=false;
						foreach($result2 as $row2) {
							if($row2[id_cotisation]==2 or $row2[id_cotisation]==3 or $row2[id_cotisation]==1){
								$inscrit = true;
							}
						}
	
						//si exception
						if ($row[guidage_exception]==$cours){
							if($row[guidage]=='guideur(se)'){
								if ($inscrit === true) {
									//echo '<td>Adding '.$row[nom].' as guidée to count for cours'.$id_cours.'</td>';
									//echo '<br>';
									$nbr_guide[$id_cours]++;
								}
								else {
									$nbr_guide_pre[$id_cours]++;
								}
							}else{
								if ($inscrit === true) {
									//echo '<td>Adding '.$row[nom].' as guideur to count for cours'.$id_cours.'</td>';
									//echo '<br>';
									$nbr_guideur[$id_cours]++;
								}
								else {
									$nbr_guideur_pre[$id_cours]++;
								}
							}
						}else{
							if($row[guidage]=='guideur(se)'){
								if ($inscrit === true) {
									//echo '<td>Adding '.$row[nom].' as guideur to count for cours'.$id_cours.'</td>';
									//echo '<br>';
									$nbr_guideur[$id_cours]++;
								}
								else {
									$nbr_guideur_pre[$id_cours]++;
								}
								
							}else{
								if ($inscrit === true) {
									//echo '<td>Adding '.$row[nom].' as guidée to count for cours'.$id_cours.'</td>';
									//echo '<br>';
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