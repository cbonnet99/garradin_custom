<?php

//SELECT membres.nom, cotisations_membres.id_cotisation FROM membres, cotisations_membres WHERE membres.id = cotisations_membres.id_membre ORDER BY membres.nom
	

$query="SELECT id, nom, cours, forfait_milonga FROM membres WHERE (cours NOT LIKE 'null' AND cours NOT LIKE '0') OR forfait_milonga LIKE '1' ORDER BY UPPER(nom)";
	
//recherche
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($query);
?>
     <html>
        <head>
          <meta content="text/html; charset=UTF-8" http-equiv="content-type">
          <title>entrée milonga</title>
        </head>
        <body>
			<table border=1>
				<tr>
				<td>Nom</td>
				<td>forfait cours</td>
				<td>forfait milonga</td>
				<td></td>
				</tr>			
			<?php
			foreach($result as $row) {
					$query2="SELECT id_cotisation FROM cotisations_membres WHERE cotisations_membres.id_membre=".$row[id];
					$result2 = $file_db->query($query2);
					$forfait_mil='';
					$forfait_cou='';
					foreach($result2 as $row2) {
						switch ($row2[id_cotisation]) {
							case 5:
								$forfait_cou='payé';
								break;
							case 6:
								$forfait_cou='payé';
								break;
							case 7:
								$forfait_cou='payé';
								break;
							case 8:
								$forfait_cou='payé';
								break;
							case 9:
								$forfait_cou='payé';
								break;
							case 10:
								$forfait_cou='payé';
								break;
							case 12:
								$forfait_mil='payé';
								break;
							case 13:
								$forfait_mil='payé';
								break;
						}
			
					}

					echo '<tr>';
					echo '<td>'.$row[nom].'</td>';
					echo '<td>'.$forfait_cou.'</td>';
					echo '<td>'.$forfait_mil.'</td>';
					echo '<td></td>';

					echo '</tr>';
				}
			?>
			</table>
		</body>
	</html>

	
