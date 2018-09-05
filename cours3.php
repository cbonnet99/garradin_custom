<?php
$id_cours = $_GET['id_cours'];
$query='SELECT id, date_inscription, nom, cours, guidage, guidage_exception FROM membres ORDER BY nom';
//$query='SELECT membres.id, membres.date_inscription, membres.nom, membres.cours, membres.guidage, membres.guidage_exception, cotisations_membres.id_cotisation FROM membres,cotisations_membres  WHERE membres.id=cotisations_membres.id_membre ORDER by membres.nom';

$nbr_guideur=0;
$nbr_guide=0;
$table_guide = array();
$table_guideur = array();



$table_cours = array(
17 => 'PARCOURS 2 TANGO - Anne-Marie & Patrice - lundi 19h00',
16 => 'PARCOURS 2&3 MILONGA - Anne-Marie & Patrice - lundi 20h00',
15 => 'PARCOURS 3 - Xavier & Florence - lundi 21h30',
14 => 'PARCOURS 1 1ère année - Daniel et Marlène - lundi 20h00',
13 => 'PARCOURS 1 1ère année - Leslie & Guilhem - mardi 19h00',
12 => 'PARCOURS 1 2nde année - Leslie & Guilhem - mardi 20h00',
11 => 'PARCOURS 2 - Leslie & Guilhem - mardi 21h00',
10 => 'PARCOURS 2 & 3 Technique Couple - Virginia & César - mercredi 12h30',
9 => 'PARCOURS 1 1ère année - Virginia & César - mercredi 19h30',
8 => 'PARCOURS 1 2nde année - Virginia & César - mercredi 20h30',
7 => 'PARCOURS 2 - Virginia & César César - mercredi 21h30',
6 => 'PARCOURS 1 1ère année - Pablo AGUDIO - mercredi 20h30',
5 => 'PARCOURS 2&3 Technique Femme-Homme - César & Virginia - jeudi 19h00',
4 => 'PARCOURS 3 - Virginia & César - jeudi 20h00',
3 => 'PARCOURS 1 1ère année - Pablo AGUDIO - jeudi 20h00',
2 => 'PARCOURS 2&3 Technique Femme-Homme - César & Virginia - vendredi 12h30',
1 => 'PARCOURS 1 1ère année - Daniel - samedi 10h00',
0 => 'PARCOURS 1 2nde année - Daniel - samedi 11h00'
);

$table_cotis = array(
2 => 'Adhésion',
3 => 'Adhésion tarif réduit',
4 => 'Adhésion tarif couple',
5 => 'Forfait annuel (1 cours)',
6 => 'Forfait annuel (1 cours) réduit',
7 => 'Forfait annuel (2 cours)',
8 => 'Forfait annuel (2 cours) réduit',
9 => 'Forfait Passion (3 a 5 cours)',
10 => 'Forfait Passion (3 a 5 cours) réduit',
11 => '10 cours (validité 1 saison)',
12 => 'Forfait Milonga',
13 => 'Forfait Milonga gratuit',
);

	
//recherche
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($query);



?>
     <html>
        <head>
          <meta content="text/html; charset=UTF-8" http-equiv="content-type">
          <title></title>
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
						if($row2[id_cotisation]<>2 and $row2[id_cotisation]<>3 and $row2[id_cotisation]<>4){
							$cotis = $cotis.'<br>'.$table_cotis[$row2[id_cotisation]];
						}
					}
					$cotis = $cotis.'</i>';	
					if ($cotis=='<i></i>'){
						$cotis='<br><font color="red"><i>pas de forfait</i></font>';
					}
				
					
					//test est inscrit au cours
					$tutu=decbin($row[cours]);
					$tutu=str_pad($tutu, 18, "0", STR_PAD_LEFT);
					
					if(substr($tutu, $id_cours, 1)=="1"){
					
						echo '<tr>';
						echo '<td>'.$row[nom].'</td>';
						//si exception
						if ($row[guidage_exception]==$cours){
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

			<table CELLSPACING="20">
				<tr>
					<td><h3>Guideurs par ordre d'incription</h3></td>
					<td><h3>Guidés par ordre d'inscription</h3></td>
				</tr>
				<tr>
					<td VALIGN=TOP>
						<table border=1>
						<?php
						foreach($table_guideur as $value) {
							echo '<tr><td>'.$value.'</td></tr>';
						}
						?>
						</table>
					</td>
					<td VALIGN=TOP>
						<table border=1>
						<?php
						foreach($table_guide as $value) {
							echo '<tr><td>'.$value.'</td></tr>';
						}
						?>
						</table>
					</td>
				</tr>	
			</table>

	
		</body>
	</html>
