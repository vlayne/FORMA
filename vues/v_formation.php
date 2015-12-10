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
			for($j = 0; $j < 7; $j++)
			{
				echo "<td>".$formation[$i][$j]. "</td>";
			}
			if(isset($_SESSION['connecter']))
			{	
				?>
				<td><form method ='post' action=index.php?uc=inscrireFormation&formation=<?php echo $formation ?>>
					<input type='submit' value="s'inscrire" />
				</form>
				</td>
				<?php
			}
			echo "</tr>";
			
		}
		?>
		</table>
<?php


?>