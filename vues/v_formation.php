<center>Voici la liste des formations proposés : </center>
</br>
<table border>
		<tr>
			<td>Nom de la formation</td>
			<td>Coût de la formation</td>
			<td>Nombre de place restante</td>
			<td>Lieu de la formation</td>
			<td>Objectif de la formation</td>
		</tr>
		<?php		
		for($i = 0; $i < count($formation); $i++)
		{
			echo "<tr>";
			for($j = 1; $j < 5; $j++)
			{
				echo "<td>".$formation[$i][$j]. "</td>";
			}
				echo "<td>".$formation[$i][7]. "</td>";
			echo "</tr>";
			
		}
		?>
		</table>
<?php


?>