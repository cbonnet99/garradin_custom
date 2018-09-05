<?php
$id_cours = $_GET['id_cours'];
$query='select nom, cours, guidage, guidage_exception from membres';
$nbr_guideur=0;
$nbr_guide=0;

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
          <p><?php echo $table_cours[$id_cours] ?></p>
			<table border=1>
			<?php
			foreach($result as $row) {


				//test est inscrit au cours
				$tutu=decbin($row['cours']);
				$tutu=str_pad($tutu, 18, "0", STR_PAD_LEFT);

				if(substr($tutu, $id_cours, 1)=="1"){
					echo '<tr>';
					echo '<td>'.$row[nom].'</td>';
					//si exception
					if ($row[guidage_exception]==$cours){
						if($row[guidage]=='guideur(se)'){
							echo '<td>guidé(e)</td>';
							$nbr_guide = $nbr_guide+1;
							}else{
							echo '<td>guideur(se)</td>';
							$nbr_guideur = $nbr_guideur+1;
						}
					}else{
						echo '<td>'.$row[guidage].'</td>';
						if($row[guidage]=='guideur(se)'){
							$nbr_guideur = $nbr_guideur+1;
							}else{
							$nbr_guide = $nbr_guide+1;
						}
					}
					echo '<td>'.$row[guidage_exception].'</td>';
					echo '</tr>';
				}
			
			}
			?>
			</table>
			<?php echo $nbr_guideur ?> guideurs(se)<br>
			<?php echo $nbr_guide ?> guidé(e)<br>
	
		</body>
	</html>
