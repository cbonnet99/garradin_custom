<?php
session_start();

//echo $_POST[nom]."<br>";
//echo $_POST[email]."<br>";
//echo $_POST[adresse]."<br>";
//echo $_POST[code_postal]."<br>";
//echo $_POST[ville]."<br>";
//echo $_POST[pays]."<br>";
//echo $_POST[telephone]."<br>";
//echo $_POST[date_naissance]."<br>";
//echo $_POST[profession]."<br>";
//echo $_POST[sexe]."<br>";
//echo $_POST[conjoint]."<br>";
//echo $_POST[nbr_an_tango]."<br>";

//echo $_POST[cours][17]."<br>";
$binaire="";
for ($i = 17; $i >= 0; $i--) {
	if (isset($_POST[cours][$i])) {
		$binaire = $binaire."1";
	}else{
		$binaire = $binaire."0";
	}
}
$cours = bindec($binaire);
//echo $binaire.' = '.bindec($binaire).'<br>';
//-----------------------------------------------

//echo $_POST[guidage]."<br>";

//echo $_POST[guidage_exception][17]."<br>";
$binaire="";
for ($i = 17; $i >= 0; $i--) {
	if (isset($_POST[guidage_exception][$i])) {
		$binaire = $binaire."1";
	}else{
		$binaire = $binaire."0";
	}
}
$guidage_exception = bindec($binaire);
//echo $binaire.' = '.bindec($binaire).'<br>';
//------------------------------------------------

//echo $_POST[connu_tangueando][5]."<br>";
$binaire="";
for ($i = 5; $i >= 0; $i--) {
	if (isset($_POST[connu_tangueando][$i])) {
		$binaire = $binaire."1";
	}else{
		$binaire = $binaire."0";
	}
}
$connu_tangueando = bindec($binaire);
//echo $binaire.' = '.bindec($binaire).'<br>';
//----------------------------------------
 
//echo $_POST[vie_asso][6]."<br>";
$binaire="";
for ($i = 6; $i >= 0; $i--) {
	if (isset($_POST[vie_asso][$i])) {
		$binaire = $binaire."1";
	}else{
		$binaire = $binaire."0";
	}
}
$vie_asso = bindec($binaire);
//echo $binaire.' = '.bindec($binaire).'<br>';
//----------------------------------------
 
//echo $_POST[passe]."<br>"; 
//echo $_POST[repasse]."<br>"; 
 

// ----------------------update
$update = "UPDATE membres SET ".
"nom='".str_replace ( "'" , "''" , $_POST[nom])."', ".
"adresse='".str_replace ( "'" , "''" , $_POST[adresse])."', ".
"code_postal='".$_POST[code_postal]."', ".
"ville='".str_replace ( "'" , "''" , $_POST[ville])."', ".
"pays='".$_POST[pays]."', ".
"telephone='".$_POST[telephone]."', ".
"date_naissance='".$_POST[date_naissance]."', ".
"profession='".str_replace ( "'" , "''" , $_POST[profession])."', ".
"sexe='".$_POST[sexe]."', ".
"conjoint='".str_replace ( "'" , "''" , $_POST[conjoint])."', ".
"nbr_an_tango='".$_POST[nbr_an_tango]."', ".
"pratique='".str_replace ( "'" , "''" , $_POST[pratique])."', ".
"cours='".$cours."', ".
"guidage='".$_POST[guidage]."', ".
"guidage_exception='".$guidage_exception."', ".
"connu_tangueando='".$connu_tangueando."', ".
"vie_asso='".$vie_asso."', ".
"date_inscription='".date('Y-m-d')."' ".
"WHERE email = '".$_SESSION['email']."'";
//"WHERE email = 'b.bonafos@laposte.net'";

//echo $update.'<br>';

$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($update);

?>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>inscription saison 2017-2018</title>
	<link rel="stylesheet" type="text/css" href="admin.css" media="all">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <link rel="stylesheet" type="text/css" href="handheld.css" media="handheld,screen and (max-width:981px)">
	<link rel="stylesheet" type="text/css" href="datepickr.css">
  </head>
  <body>
  <div class="header">
    <h1>TANGUEANDO - LA MAISON DU TANGO</h1>
  </div>
  <div class="page">
  <fieldset style="width:800px;">
  <legend>Saison 2017-2018</legend>
  Merci, votre enregistrement a bien été pris en compte - L'équipe de Tangueando<br><br>
    A bientôt sur <a target="_blank"  href="http://tangueando.fr">tangueando</a>	et sur<a target="_blank" href="https://www.facebook.com/tangueando.toulouse"><img align="middle" style="width: 59px; height: 33px;" alt="" src="facebook.png"></a>
    <br>
  </fieldset>
  </div>
</body></html>
