<?php

//compte combien de gens ont 1 cours, 2 cours, ...
$nbr_gens = array(
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

//print_r($nbr_gens);

//recherche
$query='select nom, cours, guidage, guidage_exception from membres';
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($query);



foreach($result as $row) {
	$cours_binaire=decbin($row[cours]);
	$cours_binaire=str_pad($cours_binaire, 17, "0", STR_PAD_LEFT);
	$cours_binaire = strrev($cours_binaire);
	$nbr_cours=substr_count($cours_binaire, '1');
	//echo $tutu.' '.$nbr_cours.'<br>';
	$nbr_gens[$nbr_cours]=$nbr_gens[$nbr_cours]+1;
}

//print_r($nbr_gens);
foreach ($nbr_gens as $i => $val) {
   echo "Il y a ".$val." personnes qui sont inscrites à ".$i." cours<br>";
}
			
			
?>