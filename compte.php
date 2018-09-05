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

//recherche
$query='select nom, cours, guidage, guidage_exception from membres';
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($query);

foreach($result as $row) {

				//test est inscrit au cours
				$tutu=decbin($row['cours']);
				$tutu=str_pad($tutu, 18, "0", STR_PAD_LEFT);
				//echo $tutu.'<br>';
				//echo $row[nom].' '.$row[guidage].' '.$row[guidage_exception].'<br>';

				for($id_cours=0;$id_cours<=17;$id_cours++){

				
					if(substr($tutu, $id_cours, 1)=="1"){

						//si exception
						if ($row[guidage_exception]==$cours){
							if($row[guidage]=='guideur(se)'){
								//echo '<td>guidé(e)</td>';
								$nbr_guide[$id_cours]++;
								//echo 'guide[]<br>';
								//print_r($nbr_guide);
								//echo '<br>';
							}else{
								//echo '<td>guideur(se)</td>';
								$nbr_guideur[$id_cours]++;
								//echo 'guideur[]<br>';
								//print_r($nbr_guideur);
								//echo '<br>';
							}
						}else{
							//echo '<td>'.$row[guidage].'</td>';
							if($row[guidage]=='guideur(se)'){
								$nbr_guideur[$id_cours]++;
								//echo 'guideur[]<br>';
								//print_r($nbr_guideur);
								//echo '<br>';
							}else{
								$nbr_guide[$id_cours]++;
								//echo 'guide[]<br>';
								//print_r($nbr_guide);
								//echo '<br>';
							}
						}
					}
				}
			}

?>