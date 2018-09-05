<?php

include 'compte.php';

?>

<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title></title>
  </head>
  <body>
    <table style="width: 100%" border="1">
      <tbody>
        <tr>
          <td></td>
			<?php 
			for($i=0;$i<=17;$i++){
			echo '<td>'.$i.'</td>';
			}
			?>
		</tr>
        <tr>
          <td>guideur</td>
			<?php 
			for($i=0;$i<=17;$i++){
			echo '<td>'.$nbr_guideur[$i].'</td>';
			}
			?>
        </tr>
        <tr>
          <td>guidé</td>
			<?php 
			for($i=0;$i<=17;$i++){
			echo '<td>'.$nbr_guide[$i].'</td>';
			}
			?>
        </tr>
      </tbody>
    </table>
    <p><br>
    </p>
  </body>
</html>

