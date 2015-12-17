<center>Voici la liste des stagiaire à valider : </center>
<table border>
		<tr>
			<td>Nom du stagiaire</td>
			<td>Prenom du stagiaire</td>
			<td>Nom de la formation</td>					
		</tr>
		<?php		
		for($i = 0; $i < count($afficherInscritEnCours); $i++)
		{
			echo "<tr>";
			for($j = 0; $j < 3; $j++)
			{
				echo "<td>".$afficherInscritEnCours[$i][$j]. "</td>";
				$dom = $afficherInscritEnCours[$i][3];
				$forma = $afficherInscritEnCours[$i][5];
				$session = $afficherInscritEnCours[$i][4];
				$id_util = $afficherInscritEnCours[$i][6];
			}
			?>
			<td><form method='post' action=index.php?uc=ValiderFormation&domaine=<?php echo $dom ?>&formation=<?php echo $forma ?>&session=<?php echo $session ?>&idUtil=<?php echo $id_util?>>
			<input type='submit' value="valider" ></form></td>	
			<?php
			echo "</tr>";
		}
			?>	

