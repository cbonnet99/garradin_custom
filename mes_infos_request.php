<?php
session_start();
$cle=$_SESSION['email'];
//$cle='b.bonafos@laposte.net';

$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query("SELECT * FROM membres WHERE email='".$cle."'");
foreach($result as $row) {
     //echo "nom: " . $row['nom'] . "<br>";
     //echo "<br>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Mes informations personnelles</title>
    <link rel="icon" type="image/png" href="http://www.tangueando.fr/garradin-0.7.7/www/admin/static/icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, target-densitydpi=device-dpi">
    <link rel="stylesheet" type="text/css" href="admin.css" media="all">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <link rel="stylesheet" type="text/css" href="handheld.css" media="handheld,screen and (max-width:981px)">
    <script type="text/javascript" src="global.js"></script>
    <script type="text/javascript" src="password.js"></script>
	<script type="text/javascript" src="datepickr.js"></script>
	<link rel="stylesheet" type="text/css" href="datepickr.css">
</head>

<body data-url="http://www.tangueando.fr/garradin-0.7.7/www/admin/">

<div class="header">
    <h1>Mes informations personnelles</h1>
</div>

<div class="page">

<form method="post" action="mes_infos_res.php">

    <fieldset style="width:640px;">
        <legend>Informations personnelles</legend>
        <dl>
    <dd class="help">Ces informations nous sont nécessaires afin vous contacter et&nbsp;
        pour la vie courante de notre association (parité et équilibre des
        cours, analyses, informations légales, communications, etc.)<br>
        Elles sont strictement conservées dans notre base de données et ne font
        pas l’objet d’une utilisation commerciale. Merci de bien vouloir remplir
        les différents champs demandés.</dd><br>
    <dt><label for="f_nom">Nom &amp; prénom</label> <b title="(Champ obligatoire)">obligatoire</b></dt>
    <dd><input name="nom" id="f_nom" required="required" value="<?php echo $row['nom']; ?>" type="text"></dd>
	
    <dt><label for="f_email">Adresse E-Mail</label> <b title="(Champ obligatoire)">obligatoire</b></dt>
    <dd><input name="email" id="f_email" required="required" value="<?php echo $row['email']; ?>" type="email" disabled="disabled"></dd>
	
    <dt><label for="f_adresse">Adresse postale</label></dt>
    <dd class="help">Indiquer ici le numéro, le type de voie, etc.</dd>
    <dd><textarea name="adresse" id="f_adresse"  cols="30" rows="5"><?php echo $row['adresse']; ?></textarea></dd>
	
    <dt><label for="f_code_postal">Code postal</label></dt>
    <dd><input name="code_postal" id="f_code_postal" value="<?php echo $row['code_postal']; ?>" type="text"></dd>
	
    <dt><label for="f_ville">Ville</label></dt>
    <dd><input name="ville" id="f_ville" value="<?php echo $row['ville']; ?>" type="text"></dd>
	
    <dt><label for="f_pays">Pays</label></dt>
    <dd><select name="pays" id="f_pays">
	<?php
	$a = array(
	"AF" => "Afghanistan",
	"ZA" => "Afrique Du Sud",
	"AX" => "Åland, Îles",
	"AL" => "Albanie",
	"DZ" => "Algérie",
	"DE" => "Allemagne",
	"AD" => "Andorre",
	"AO" => "Angola",
	"AI" => "Anguilla",
	"AQ" => "Antarctique",
	"AG" => "Antigua-et-barbuda",
	"SA" => "Arabie Saoudite",
	"AR" => "Argentine",
	"AM" => "Arménie",
	"AW" => "Aruba",
	"AU" => "Australie",
	"AT" => "Autriche",
	"AZ" => "Azerbaïdjan",
	"BS" => "Bahamas",
	"BH" => "Bahreïn",
	"BD" => "Bangladesh",
	"BB" => "Barbade",
	"BY" => "Bélarus",
	"BE" => "Belgique",
	"BZ" => "Belize",
	"BJ" => "Bénin",
	"BM" => "Bermudes",
	"BT" => "Bhoutan",
	"BO" => "Bolivie, L'état Plurinational De",
	"BQ" => "Bonaire, Saint-eustache Et Saba",
	"BA" => "Bosnie-herzégovine",
	"BW" => "Botswana",
	"BV" => "Bouvet, Île",
	"BR" => "Brésil",
	"BN" => "Brunei Darussalam",
	"BG" => "Bulgarie",
	"BF" => "Burkina Faso",
	"BI" => "Burundi",
	"KY" => "Caïmans, Îles",
	"KH" => "Cambodge",
	"CM" => "Cameroun",
	"CA" => "Canada",
	"CV" => "Cap-vert",
	"CF" => "Centrafricaine, République",
	"CL" => "Chili","CN" => "Chine",
	"CX" => "Christmas, Île",
	"CY" => "Chypre",
	"CC" => "Cocos (keeling), Îles",
	"CO" => "Colombie",
	"KM" => "Comores",
	"CG" => "Congo",
	"CD" => "Congo, La République Démocratique Du",
	"CK" => "Cook, Îles",
	"KR" => "Corée, République De",
	"KP" => "Corée, République Populaire Démocratique De",
	"CR" => "Costa Rica",
	"CI" => "Côte D'ivoire",
	"HR" => "Croatie",
	"CU" => "Cuba",
	"CW" => "Curaçao",
	"DK" => "Danemark",
	"DJ" => "Djibouti",
	"DO" => "Dominicaine, République",
	"DM" => "Dominique",
	"EG" => "Égypte",
	"SV" => "El Salvador",
	"AE" => "Émirats Arabes Unis",
	"EC" => "Équateur",
	"ER" => "Érythrée",
	"ES" => "Espagne",
	"EE" => "Estonie",
	"US" => "États-unis",
	"ET" => "Éthiopie",
	"FK" => "Falkland, Îles (malvinas)",
	"FO" => "Féroé, Îles",
	"FJ" => "Fidji",
	"FI" => "Finlande",
	"FR" => "France",
	"GA" => "Gabon",
	"GM" => "Gambie",
	"GE" => "Géorgie",
	"GS" => "Géorgie Du Sud-et-les Îles Sandwich Du Sud",
	"GH" => "Ghana",
	"GI" => "Gibraltar",
	"GR" => "Grèce",
	"GD" => "Grenade",
	"GL" => "Groenland",
	"GP" => "Guadeloupe",
	"GU" => "Guam",
	"GT" => "Guatemala",
	"GG" => "Guernesey",
	"GN" => "Guinée",
	"GW" => "Guinée-bissau",
	"GQ" => "Guinée Équatoriale",
	"GY" => "Guyana",
	"GF" => "Guyane Française",
	"HT" => "Haïti",
	"HM" => "Heard-et-îles Macdonald, Île",
	"HN" => "Honduras",
	"HK" => "Hong Kong",
	"HU" => "Hongrie",
	"IM" => "Île De Man",
	"UM" => "Îles Mineures Éloignées Des États-unis",
	"VG" => "Îles Vierges Britanniques",
	"VI" => "Îles Vierges Des États-unis",
	"IN" => "Inde",
	"ID" => "Indonésie",
	"IR" => "Iran, République Islamique D'",
	"IQ" => "Iraq",
	"IE" => "Irlande",
	"IS" => "Islande",
	"IL" => "Israël",
	"IT" => "Italie",
	"JM" => "Jamaïque",
	"JP" => "Japon",
	"JE" => "Jersey",
	"JO" => "Jordanie",
	"KZ" => "Kazakhstan",
	"KE" => "Kenya",
	"KG" => "Kirghizistan",
	"KI" => "Kiribati",
	"KW" => "Koweït",
	"LA" => "Lao, République Démocratique Populaire",
	"LS" => "Lesotho",
	"LV" => "Lettonie",
	"LB" => "Liban",
	"LR" => "Libéria",
	"LY" => "Libye",
	"LI" => "Liechtenstein",
	"LT" => "Lituanie",
	"LU" => "Luxembourg",
	"MO" => "Macao",
	"MK" => "Macédoine, L'ex-république Yougoslave De",
	"MG" => "Madagascar",
	"MY" => "Malaisie",
	"MW" => "Malawi",
	"MV" => "Maldives",
	"ML" => "Mali",
	"MT" => "Malte",
	"MP" => "Mariannes Du Nord, Îles",
	"MA" => "Maroc",
	"MH" => "Marshall, Îles",
	"MQ" => "Martinique",
	"MU" => "Maurice",
	"MR" => "Mauritanie",
	"YT" => "Mayotte",
	"MX" => "Mexique",
	"FM" => "Micronésie, États Fédérés De",
	"MD" => "Moldova, République De",
	"MC" => "Monaco",
	"MN" => "Mongolie",
	"ME" => "Monténégro",
	"MS" => "Montserrat",
	"MZ" => "Mozambique",
	"MM" => "Myanmar",
	"NA" => "Namibie",
	"NR" => "Nauru",
	"NP" => "Népal",
	"NI" => "Nicaragua",
	"NE" => "Niger",
	"NG" => "Nigéria",
	"NU" => "Niué",
	"NF" => "Norfolk, Île",
	"NO" => "Norvège",
	"NC" => "Nouvelle-calédonie",
	"NZ" => "Nouvelle-zélande",
	"IO" => "Océan Indien, Territoire Britannique De L'",
	"OM" => "Oman","UG" => "Ouganda",
	"UZ" => "Ouzbékistan",
	"PK" => "Pakistan",
	"PW" => "Palaos",
	"PS" => "Palestinien Occupé, Territoire",
	"PA" => "Panama",
	"PG" => "Papouasie-nouvelle-guinée",
	"PY" => "Paraguay",
	"NL" => "Pays-bas",
	"PE" => "Pérou",
	"PH" => "Philippines",
	"PN" => "Pitcairn",
	"PL" => "Pologne",
	"PF" => "Polynésie Française",
	"PR" => "Porto Rico",
	"PT" => "Portugal",
	"QA" => "Qatar",
	"RE" => "Réunion",
	"RO" => "Roumanie",
	"GB" => "Royaume-uni",
	"RU" => "Russie, Fédération De",
	"RW" => "Rwanda",
	"EH" => "Sahara Occidental",
	"BL" => "Saint-barthélemy",
	"SH" => "Sainte-hélène, Ascension Et Tristan Da Cunha",
	"LC" => "Sainte-lucie",
	"KN" => "Saint-kitts-et-nevis",
	"SM" => "Saint-marin",
	"MF" => "Saint-martin(partie Française)",
	"SX" => "Saint-martin (partie Néerlandaise)",
	"PM" => "Saint-pierre-et-miquelon",
	"VA" => "Saint-siège (état De La Cité Du Vatican)",
	"VC" => "Saint-vincent-et-les Grenadines",
	"SB" => "Salomon, Îles",
	"WS" => "Samoa",
	"AS" => "Samoa Américaines",
	"ST" => "Sao Tomé-et-principe",
	"SN" => "Sénégal",
	"RS" => "Serbie",
	"SC" => "Seychelles",
	"SL" => "Sierra Leone",
	"SG" => "Singapour",
	"SK" => "Slovaquie",
	"SI" => "Slovénie",
	"SO" => "Somalie",
	"SD" => "Soudan",
	"SS" => "Soudan Du Sud",
	"LK" => "Sri Lanka",
	"SE" => "Suède",
	"CH" => "Suisse",
	"SR" => "Suriname",
	"SJ" => "Svalbard Et Île Jan Mayen",
	"SZ" => "Swaziland",
	"SY" => "Syrienne, République Arabe",
	"TJ" => "Tadjikistan",
	"TW" => "Taïwan, Province De Chine",
	"TZ" => "Tanzanie, République-unie De",
	"TD" => "Tchad",
	"CZ" => "Tchèque, République",
	"TF" => "Terres Australes Françaises",
	"TH" => "Thaïlande",
	"TL" => "Timor-leste",
	"TG" => "Togo",
	"TK" => "Tokelau",
	"TO" => "Tonga",
	"TT" => "Trinité-et-tobago",
	"TN" => "Tunisie",
	"TM" => "Turkménistan",
	"TC" => "Turks-et-caïcos, Îles",
	"TR" => "Turquie",
	"TV" => "Tuvalu",
	"UA" => "Ukraine",
	"UY" => "Uruguay",
	"VU" => "Vanuatu",
	"VE" => "Venezuela, République Bolivarienne Du",
	"VN" => "Viet Nam",
	"WF" => "Wallis Et Futuna",
	"YE" => "Yémen",
	"ZM" => "Zambie",
	"ZW" => "Zimbabwe",
	
	);
	foreach ($a as $k => $v) {
		//echo $k." donne ".$v."<br>";
		if($k == $row['pays']){
			echo '<option selected value="'.$k.'">'.$v.'</option>';
		}else{
			echo '<option value="'.$k.'">'.$v.'</option>';
		}			

	}
	?>
	</select></dd>
	
    <dt><label for="f_telephone">Numéro de téléphone</label> <b title="(Champ obligatoire)">obligatoire</b></dt>
    <dd><input name="telephone" id="f_telephone" required="required" value="<?php echo $row['telephone']; ?>" type="tel"></dd>
	
	<?php
	$la_date = substr($row['date_naissance'],8, 2)."/".substr($row['date_naissance'],5, 2)."/".substr($row['date_naissance'], 0, 4);
	?>
    <dt><label for="f_date_naissance">Date de naissance (format jj/mm/aaaa)</label> <b title="(Champ obligatoire)">obligatoire</b></dt>
    <dd style="position: relative;"><input id="f_date_naissance" required="required" value="<?php echo $la_date; ?>" class=" date" size="10" pattern="([012][0-9]|3[01])/(0[0-9]|1[0-2])/[12][0-9]{3}" type="text"><input name="date_naissance" value="2017-07-14" type="hidden"><div class="calendar hidden"><div class="months"><span class="prev-month"><a href="#">&lt;</a></span><span class="next-month"><a href="#">&gt;</a></span><span class="current-month">Juillet 2017</span></div><table><thead><tr class="weekdays"><th>Lu</th><th>Ma</th><th>Me</th><th>Je</th><th>Ve</th><th>Sa</th><th>Di</th></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td class=""><a href="javascript:void(0)">1</a></td><td class=""><a href="javascript:void(0)">2</a></td></tr><tr><td class=""><a href="javascript:void(0)">3</a></td><td class=""><a href="javascript:void(0)">4</a></td><td class=""><a href="javascript:void(0)">5</a></td><td class=""><a href="javascript:void(0)">6</a></td><td class=""><a href="javascript:void(0)">7</a></td><td class=""><a href="javascript:void(0)">8</a></td><td class=""><a href="javascript:void(0)">9</a></td></tr><tr><td class=""><a href="javascript:void(0)">10</a></td><td class=""><a href="javascript:void(0)">11</a></td><td class=""><a href="javascript:void(0)">12</a></td><td class=""><a href="javascript:void(0)">13</a></td><td class="today"><a href="javascript:void(0)">14</a></td><td class=""><a href="javascript:void(0)">15</a></td><td class=""><a href="javascript:void(0)">16</a></td></tr><tr><td class=""><a href="javascript:void(0)">17</a></td><td class=""><a href="javascript:void(0)">18</a></td><td class=""><a href="javascript:void(0)">19</a></td><td class=""><a href="javascript:void(0)">20</a></td><td class=""><a href="javascript:void(0)">21</a></td><td class=""><a href="javascript:void(0)">22</a></td><td class=""><a href="javascript:void(0)">23</a></td></tr><tr><td class=""><a href="javascript:void(0)">24</a></td><td class=""><a href="javascript:void(0)">25</a></td><td class=""><a href="javascript:void(0)">26</a></td><td class=""><a href="javascript:void(0)">27</a></td><td class=""><a href="javascript:void(0)">28</a></td><td class=""><a href="javascript:void(0)">29</a></td><td class=""><a href="javascript:void(0)">30</a></td></tr><tr><td class=""><a href="javascript:void(0)">31</a></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></dd>
	
    <dt><label for="f_profession">Profession</label> <b title="(Champ obligatoire)">obligatoire</b></dt>
    <dd class="help">Ma derni&egrave;re activit&eacute; professionnelle (nb : retrait&eacute; n&rsquo;est pas une profession &ndash; Merci)</dd>
    <dd><input name="profession" id="f_profession" required="required" value="<?php echo $row['profession']; ?>" type="text"></dd> 
	
	
    <dt><label for="f_sexe">Sexe</label></dt>
    <dd><select name="sexe" id="f_sexe">
	<?php
		if($row['sexe']=="Homme"){
			echo '<option value="Femme">Femme</option>';
			echo '<option selected value="Homme">Homme</option>';
		}else{
			echo '<option selected value="Femme">Femme</option>';
			echo '<option value="Homme" >Homme</option>';
		}		
	?>
	</select></dd>
	
    <dt><label for="f_conjoint">Conjoint</label></dt>
    <dd class="help">obligatoire pour b&eacute;n&eacute;ficier du tarif &laquo; adh&eacute;sion couple &raquo;  (remplir un formulaire par personne &ndash; une m&ecirc;me adresse)</dd>
	<dd><input name="conjoint" id="f_conjoint" value="<?php echo $row['conjoint']; ?>" type="text"></dd>
	
    <dt><label for="f_nbr_an_tango">Nombre d'années de pratique du tango</label> <b title="(Champ obligatoire)">obligatoire</b></dt>
    <dd><input name="nbr_an_tango" id="f_nbr_an_tango" required="required" value="<?php echo $row['nbr_an_tango']; ?>" type="number"></dd>
	
	<dt><label for="f_pratique">Pratique du tango</label> <b title="(Champ obligatoire)">obligatoire</b></dt>
    <dd><select name="pratique" id="f_pratique" required="required">
	<?php
		if($row['pratique']=="moins de 4 fois/mois"){
			echo '<option value="moins de 4 fois/mois" autocomplete="off" selected="selected">moins de 4 fois/mois</option>';
			echo '<option value="1 fois par semaine" autocomplete="off" >1 fois par semaine</option>';
			echo '<option value="plus d\'une fois/semaine" autocomplete="off" >plus d\'une fois/semaine</option>';
		}elseif($row['pratique']=="1 fois par semaine"){
			echo '<option value="moins de 4 fois/mois" autocomplete="off" >moins de 4 fois/mois</option>';
			echo '<option value="1 fois par semaine" selected="selected" autocomplete="off" >1 fois par semaine</option>';
			echo '<option value="plus d\'une fois/semaine" autocomplete="off" >plus d\'une fois/semaine</option>';
		}else{
			echo '<option value="moins de 4 fois/mois" autocomplete="off" >moins de 4 fois/mois</option>';
			echo '<option value="1 fois par semaine" autocomplete="off" >1 fois par semaine</option>';
			echo '<option value="plus d\'une fois/semaine" autocomplete="off" selected="selected">plus d\'une fois/semaine</option>';
		}		
	?>
	</select></dd>                            
	
	
	<?php
	$tutu=decbin($row['cours']);
	$tutu=str_pad($tutu, 18, "0", STR_PAD_LEFT);
	//echo $row['cours'].'='.$tutu.'<br>';
	?>
	<dd class="help">Vous pouvez acc&eacute;der au <a target="_blank" href="cours.png">tableau hebdomadaire des cours</a> en cliquant sur le lien</dd>
    <dt><label for="f_cours">Je m'inscris au cours</label></dt>
    <dd>
	<label><input name="cours[0]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 17, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 2 TANGO - Anne-Marie &amp; Patrice - lundi 19h00 </label><br>
	<label><input name="cours[1]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 16, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 2&amp;3 MILONGA - Anne-Marie &amp; Patrice - lundi 20h00</label><br>
	<label><input name="cours[2]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 15, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 3 - Xavier &amp; Florence - lundi 21h30</label><br>
	<label><input name="cours[3]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 14, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 1ère année - Daniel et Marlène - lundi 20h00</label><br>
	<label><input name="cours[4]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 13, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 1ère année - Leslie &amp; Guilhem - mardi 19h00</label><br>
	<label><input name="cours[5]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 12, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 2nde année - Leslie &amp; Guilhem - mardi 20h00</label><br>
	<label><input name="cours[6]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 11, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 2 - Leslie &amp; Guilhem - mardi 21h00</label><br>
	<label><input name="cours[7]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 10, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 2 &amp; 3 Technique Couple - Virginia &amp; César - mercredi 12h30</label><br>
	<label><input name="cours[8]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu,  9, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 1ère année - Virginia &amp; César - mercredi 19h30</label><br>
	<label><input name="cours[9]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu,  8, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 2nde année - Virginia &amp; César - mercredi 20h30</label><br>
	<label><input name="cours[10]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 7, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 2 - Virginia &amp; César César - mercredi 21h30</label><br>
	<label><input name="cours[11]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 6, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 1ère année - Pablo AGUDIO - mercredi 20h30</label><br>
	<label><input name="cours[12]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 5, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 2&amp;3 Technique Femme-Homme - César &amp; Virginia - jeudi 19h00</label><br>
	<label><input name="cours[13]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 4, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 3 - Virginia &amp; César - jeudi 20h00</label><br>
	<label><input name="cours[14]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 3, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 1ère année - Pablo AGUDIO - jeudi 20h00</label><br>
	<label><input name="cours[15]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 2, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 2&amp;3 Technique Femme-Homme - César &amp; Virginia - vendredi 12h30</label><br>
	<label><input name="cours[16]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 1, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 1ère année - Daniel - samedi 10h00</label><br>
	<label><input name="cours[17]" value="1" id="f_cours" type="checkbox" autocomplete="off" <?php if(substr($tutu, 0, 1)=="1"){echo 'checked="checked"';}?> > PARCOURS 1 2nde année - Daniel - samedi 11h00</label><br>
	</dd>
	
    <dt><label for="f_guidage">Guidage</label> <b title="(Champ obligatoire)">obligatoire</b></dt>
    <dd class="help">Le tango &eacute;tant une danse de couple, nous avons besoin de conna&icirc;tre votre &laquo; r&ocirc;le &raquo; (guideur/guideuse ou guid&eacute;/guid&eacute;e) afin d&rsquo;&eacute;quilibrer les inscriptions :<br />
&bull; Le r&ocirc;le de &laquo; Guideur &raquo; est habituellement attribu&eacute; aux hommes,<br />
&bull; Le r&ocirc;le de &laquo; Guid&eacute;e &raquo; est traditionnellement attribu&eacute; aux femmes.<br />
Il est bien s&ucirc;r possible d&rsquo;inverser les r&ocirc;les pour tous ou certains cours. <br />
Dans ce dernier cas, l&rsquo;enregistrement d&rsquo;exceptions se fait dans un second temps.<br />
<br />
Merci d&rsquo;indiquer ci-dessous, le r&ocirc;le choisi pour l&rsquo;ensemble des cours ou pour la majorit&eacute; d&rsquo;entre eux.</dd>

    <dd><select name="guidage" id="f_guidage" required="required">
	<?php
		if($row['guidage']=="guideur(se)"){
			echo '<option value="guideur(se)" selected="selected">guideur(se)</option>';
			echo '<option value="guidé(e)">guidé(e)</option>';
		}else{
			echo '<option value="guideur(se)">guideur(se)</option>';
			echo '<option value="guidé(e)" selected="selected">guidé(e)</option>';
		}		
	?>
	</select></dd>
	
	<?php
	$tutu=decbin($row['guidage_exception']);
	$tutu=str_pad($tutu, 18, "0", STR_PAD_LEFT);
	//echo $row['guidage_exception'].'='.$tutu.'<br>';
	?>
    <dt><label for="f_guidage_exception">Exceptions pour le guidage</label></dt>
    <dd class="help">Ne cocher ici que les cours pour lesquels le r&ocirc;le principal (ou par d&eacute;faut) d&eacute;fini ci-dessus est modifi&eacute;.</dd>
    <dd>
	<label><input name="guidage_exception[0]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 17, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 2 TANGO - Anne-Marie &amp; Patrice - lundi 19h00 </label><br>
	<label><input name="guidage_exception[1]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 16, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 2&amp;3 MILONGA - Anne-Marie &amp; Patrice - lundi 20h00</label><br>
	<label><input name="guidage_exception[2]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 15, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 3 - Xavier &amp; Florence - lundi 21h30</label><br>
	<label><input name="guidage_exception[3]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 14, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 1ère année - Daniel et Marlène - lundi 20h00</label><br>
	<label><input name="guidage_exception[4]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 13, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 1ère année - Leslie &amp; Guilhem - mardi 19h00</label><br>
	<label><input name="guidage_exception[5]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 12, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 2nde année - Leslie &amp; Guilhem - mardi 20h00</label><br>
	<label><input name="guidage_exception[6]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 11, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 2 - Leslie &amp; Guilhem - mardi 21h00</label><br>
	<label><input name="guidage_exception[7]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 10, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 2 &amp; 3 Technique Couple - Virginia &amp; César - mercredi 12h30</label><br>
	<label><input name="guidage_exception[8]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 9, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 1ère année - Virginia &amp; César - mercredi 19h30</label><br>
	<label><input name="guidage_exception[9]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 8, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 2nde année - Virginia &amp; César - mercredi 20h30</label><br>
	<label><input name="guidage_exception[10]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 7, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 2 - Virginia &amp; César César - mercredi 21h30</label><br>
	<label><input name="guidage_exception[11]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 6, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 1ère année - Pablo AGUDIO - mercredi 20h30</label><br>
	<label><input name="guidage_exception[12]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 5, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 2&amp;3 Technique Femme-Homme - César &amp; Virginia - jeudi 19h00</label><br>
	<label><input name="guidage_exception[13]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 4, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 3 - Virginia &amp; César - jeudi 20h00</label><br>
	<label><input name="guidage_exception[14]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 3, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 1ère année - Pablo AGUDIO - jeudi 20h00</label><br>
	<label><input name="guidage_exception[15]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 2, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 2&amp;3 Technique Femme-Homme - César &amp; Virginia - vendredi 12h30</label><br>
	<label><input name="guidage_exception[16]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 1, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 1ère année - Daniel - samedi 10h00</label><br>
	<label><input name="guidage_exception[17]" value="1" id="f_guidage_exception" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 0, 1)=="1"){echo ' checked="checked"';}?> > PARCOURS 1 2nde année - Daniel - samedi 11h00</label><br>
	</dd>                                                    

                                                 
    
	<?php
	$tutu=decbin($row['vie_asso']);
	$tutu=str_pad($tutu, 7, "0", STR_PAD_LEFT);
	//echo $row['vie_asso'].'='.$tutu.'<br>';
	?> 	
	<dt><label for="f_vie_asso">Vie associative</label></dt>
    <dd class="help">Tangueando Toulouse est une association au plein sens du terme, riche d'activit&eacute;s (cours et &eacute;v&eacute;nements), qui repose sur la participation de tous pour son bon fonctionnement. Tangueando Toulouse a besoin de VOTRE engagement associatif. <br />
Les membres du Conseil d'Administration (CA) que vous avez d&eacute;sign&eacute; lors de notre Assembl&eacute;e G&eacute;n&eacute;rale annuelle comptent sur vous. <br />
En cochant une case ci-dessous, vous pouvez rejoindre &agrave; votre rythme, ponctuellement ou r&eacute;guli&egrave;rement, l'&eacute;quipe de b&eacute;n&eacute;voles et membres du CA qui actuellement sont en charge des diff&eacute;rents postes d'activit&eacute;.<br /></dd>
    <dd>
	<label><input name="vie_asso[0]" value="1" id="f_vie_asso" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 6, 1)=="1"){echo ' checked="checked"';}?> > Buvette associative</label><br>
	<label><input name="vie_asso[1]" value="1" id="f_vie_asso" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 5, 1)=="1"){echo ' checked="checked"';}?> > Accueil aux Milongas</label><br>
	<label><input name="vie_asso[2]" value="1" id="f_vie_asso" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 4, 1)=="1"){echo ' checked="checked"';}?> > Communication</label><br>
	<label><input name="vie_asso[3]" value="1" id="f_vie_asso" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 3, 1)=="1"){echo ' checked="checked"';}?> > Organisation évènements</label><br>
	<label><input name="vie_asso[4]" value="1" id="f_vie_asso" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 2, 1)=="1"){echo ' checked="checked"';}?> > Bricolage – Décoration</label><br>
	<label><input name="vie_asso[5]" value="1" id="f_vie_asso" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 1, 1)=="1"){echo ' checked="checked"';}?> > Participer au Conseil d'Administration</label><br>
	<label><input name="vie_asso[6]" value="1" id="f_vie_asso" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 0, 1)=="1"){echo ' checked="checked"';}?> > plus tard</label><br>
	</dd>

    <dd class="help">Si pour des motifs de disponibilit&eacute; vous ne pouvez pas vous engager plus avant, il est possible de participer activement &agrave; la promotion de votre association en invitant vos proches et connaissances &agrave; fr&eacute;quenter nos cours ou nos diff&eacute;rents &eacute;v&egrave;nements (milongas, concerts, expositions, etc.).<br><br></dd>
	<dd class="help"><U>Communication &ndash; Informations</U><br>
Les membres de Tangueando sont abonn&eacute;s &agrave; notre lettre d&rsquo;information, el boletin. Cela vous permet d&rsquo;&ecirc;tre inform&eacute;s de nos activit&eacute;s ou de nos r&eacute;unions statutaires. Il vous sera possible de vous d&eacute;sabonner &agrave; tout moment en activant un lien en bas de page de notre bulletin.<br>
Tangueando dispose &eacute;galement d&rsquo;une page Facebook pour vous tenir inform&eacute;s de nos activit&eacute;s ou des informations de derni&egrave;re minute. <br>
En cliquant sur le lien suivant, vous pouvez &laquo; aimer &raquo; sans &ecirc;tre obligatoirement &ecirc;tre visibles sur notre mur d&rsquo;actualit&eacute;s.<a target="_blank" href="https://www.facebook.com/tangueando.toulouse"><img align="middle" style="width: 59px; height: 33px;" alt="" src="facebook.png"></a><br><br></dd>
	<dd class="help"><U>Autorisation DROIT A L&rsquo;IMAGE</U><br>
Dans le cadre des activit&eacute;s de notre associationdes photos ou vid&eacute;os peuvent &ecirc;tre utilis&eacute;es en vue d&rsquo;illustrer ou de promouvoir nos activit&eacute;s.En aucun cas les l&eacute;gendes ou commentaires ne permettront d&rsquo;identifier une personne.<br>
Si vous ne souhaitez pas que votre image soit utilis&eacute;e, vous pouvez nous adresser un courrier en ce sens accompagn&eacute; de votre photo r&eacute;cente afin que nous puissions vous identifier.<br></dd><br>
	
		<?php
	$tutu=decbin($row['connu_tangueando']);
	$tutu=str_pad($tutu, 6, "0", STR_PAD_LEFT);
	//echo $row['connu_tangueando'].'='.$tutu.'<br>';
	?>    
	<dt><label for="f_connu_tangueando">J'ai connu Tangueando par</label></dt>
    <dd>
	<label><input name="connu_tangueando[0]" value="1" id="f_connu_tangueando" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 5, 1)=="1"){echo ' checked="checked"';}?> >  Internet</label><br>
	<label><input name="connu_tangueando[1]" value="1" id="f_connu_tangueando" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 4, 1)=="1"){echo ' checked="checked"';}?> > Saint-Georges / Gd-Rond</label><br>
	<label><input name="connu_tangueando[2]" value="1" id="f_connu_tangueando" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 3, 1)=="1"){echo ' checked="checked"';}?> > Amis</label><br>
	<label><input name="connu_tangueando[3]" value="1" id="f_connu_tangueando" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 2, 1)=="1"){echo ' checked="checked"';}?> > Sites de sorties</label><br>
	<label><input name="connu_tangueando[4]" value="1" id="f_connu_tangueando" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 1, 1)=="1"){echo ' checked="checked"';}?> > Festival Tangopostale</label><br>
	<label><input name="connu_tangueando[5]" value="1" id="f_connu_tangueando" type="checkbox"  autocomplete="off" <?php if(substr($tutu, 0, 1)=="1"){echo ' checked="checked"';}?> > Autre</label><br>
	</dd>   
	</dl>
	</fieldset>
 
    <p class="submit">
        <input name="gecko/H14kW3+13uDmJ3NFMy3y0sNTu+U=" value="db8417b3155c3d9be449e5f16b12913d5d2b2584" type="hidden">        <input name="save" value="Enregistrer →" type="submit">
    </p>

</form>








<script type="text/javascript">

g.script('scripts/password.js').onload = function () {
    initPasswordField('password_suggest', 'f_passe', 'f_repasse');
};
</script>

</div>

<script type="text/javascript" defer="defer">

(function () {
    var keep_session_url = "http://www.tangueando.fr/garradin-0.7.7/www/admin/login.php?keepSessionAlive&";

    function refreshSession()
    {
        var _RIMAGE = new Image(1,1);
        _RIMAGE.src = keep_session_url + Math.round(Math.random()*1000000000);
    }
    window.setInterval(refreshSession, 10 * 60 * 1000);
} ());
</script>



</body></html>
