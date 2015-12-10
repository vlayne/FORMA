<center>Voici la liste des formations proposés : </center>
</br>
<table border>
		<tr>
			<td>Nom de la formation</td>
			<td>Coût de la formation</td>
			<td>Nombre de place restante</td>
			<td>Lieu de la formation</td>
			<td>Jour de la formation</td>
			<td>Heure de commencement</td>
			<td>Heure de fin</td>
		</tr>
		<?php		
		for($i = 0; $i < count($formation); $i++)
		{			
			echo "<tr>";
			for($j = 3; $j < 10; $j++)
			{
				echo "<td>".$formation[$i][$j]. "</td>";
				$dom = $formation[$i][0];
				$forma = $formation[$i][1];
				$session = $formation[$i][2];
			}
			if(isset($_SESSION['connecter']))
			{	
				?>
				<td><form method='post' action =index.php?uc=inscrireFormation&domaine=<?php echo $dom ?>&formation=<?php echo $forma ?>&session=<?php echo $session ?>>
				 <input type='submit' value="s'inscrire" ></form></td>				
				<?php
			}
			echo "</tr>";
			
		}
		?>
		</table>
<?php


?>