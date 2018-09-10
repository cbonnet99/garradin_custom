<?php

//on sélectionne uniquements les membres actifs (catégorie 1), les admins (catégorie 3) et les accueils (catégorie 5)
$query="SELECT id, nom FROM membres WHERE id_categorie IN (1, 3, 5) ORDER BY UPPER(nom)";
	
//recherche
$file_db = new PDO('sqlite:../association.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $file_db->query($query);
?>
     <html>
        <head>
          <meta content="text/html; charset=UTF-8" http-equiv="content-type">
          <title>Entrées milonga</title>
        </head>
        <body>
			<table border=1>
				<tr>
				<td>Nom</td>
				</tr>			
			<?php
			foreach($result as $row) {

					echo '<tr>';
					echo '<td>'.$row[nom].'</td>';
					echo '</tr>';
				}
			?>
			</table>
		</body>
	</html>

	
