<?php
$cle = $_POST['email'];

//creation passe
	$caract = "abcdefghijklmnopqrstuvwyxzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$passe='';
	for($i = 1; $i <= 10; $i++) {
		$passe=$passe.substr($caract, rand(0, 61), 1);
		$crypt=md5($passe);
	}
	
//recherche email
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query("SELECT id, email FROM membres WHERE email='".$cle."'");
$trouve=false;
foreach($result as $row) {
	if (strcmp($row[email], $cle) == 0) {
		$trouve=true;
	}
}

//stockage passe
if($trouve){
	$update = "UPDATE membres SET passe='".$crypt."' WHERE email = '".$cle."'";
	$result = $file_db->query($update);
	//echo $update;
}else{
	$insert="INSERT INTO membres (id_categorie,email,passe) VALUES (5,'".$cle."','".$crypt."')";
	$result = $file_db->query($insert);
	//echo $insert;
}

//envoi passe
$to = $cle;
$subject = '[tangueando] Nouveau mot de passe';

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}else{
	$passage_ligne = "\n";
}     
$boundary = "-----=".md5(rand());

$header = "From: \"tanguean\"<tanguean@240plan.ovh.net>".$passage_ligne;
$header.= "Reply-to: \"ne pas repondre\" <tanguean@240plan.ovh.net>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;	 
	 
	$header  = 'MIME-Version: 1.0' .$passage_ligne;
	$header .= 'Content-type: text/html; charset=iso-8859-1' .$passage_ligne;
	$header .= "From:tanguean@240plan.ovh.net" .$passage_ligne;
	
//$message = $passage_ligne."--".$boundary.$passage_ligne;
/*
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= "Bonjour,".$passage_ligne;
$message.= 'Vous avez demandé un mot de passe pour votre compte'.$passage_ligne.$passage_ligne;
$message.= 'Votre adresse email : '.$to.$passage_ligne;
$message.= 'Votre mot de passe : '.$passe.$passage_ligne.$passage_ligne;
$message.= 'Si vous n\'avez pas demandé à recevoir ce message, merci de nous le signaler'.$passage_ligne;
*/
//$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
//$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= "Bonjour,<br>".$passage_ligne;
$message.= 'Vous avez demand&eacute; un mot de passe pour votre compte<br><br>'.$passage_ligne.$passage_ligne;
$message.= 'Votre adresse email : '.$to.'<br>'.$passage_ligne;
$message.= 'Votre mot de passe : '.$passe.'<br><br>'.$passage_ligne;
$message.= 'Si vous n\'avez pas demand&eacute; &agrave; recevoir ce message, merci de nous le signaler<br>'.$passage_ligne;

//$message.= $passage_ligne."--".$boundary.$passage_ligne;


mail($to, $subject, $message, $header);

?>
     <html>
        <head>
          <meta content="text/html; charset=UTF-8" http-equiv="content-type">
          <title></title>
        </head>
        <body>
          <p>Un email vient de vous être envoyé avec votre mot de
            passe.</p>
			<form method="POST" action="login.php" name="login">
			email <input size="40" name="email" type="email" value="<?php echo $cle; ?>"><br>
            passe <input size="40" name="passe" type="password"><br>
            <br>
            <input formmethod="post" name="login" type="submit"><br>
			</form>
		</body>
	</html>
