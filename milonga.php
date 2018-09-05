<?php

$query="SELECT nom, cours, forfait_milonga FROM membres WHERE (cours NOT LIKE 'null' AND cours NOT LIKE '0') OR forfait_milonga LIKE '1' ORDER BY UPPER(nom)";
	
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
				<td>code cours</td>
				<td>forfait milonga</td>
				</tr>			
			<?php
			foreach($result as $row) {
					echo '<tr>';
					echo '<td>'.$row[nom].'</td>';
					echo '<td>'.$row[cours].'</td>';
					echo '<td>'.$row[forfait_milonga].'</td>';
					echo '</tr>';
				}
			?>
			</table>
		</body>
	</html>
