<?php

$select="SELECT id, passe FROM membres WHERE email='".$_POST[email]."'";
$erreur='login ou mot de passe incorrect<br><a href="preinscription.html">réessayer</a><br>';

//recherche email & passe
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$test = $file_db->query($select);
$result = $file_db->query($select);

$columns = $test->fetch();

if(count($columns)==4){
	foreach($result as $row) {
		if (strcmp($row[passe], md5($_POST[passe])) == 0) {
			session_start();
			$_SESSION['email'] = $_POST[email];
			header('Location: mes_infos_request.php');
		}else{
			echo $erreur."<br>";
		}	
	}
}else{
	echo $erreur."<br>";
}


?>