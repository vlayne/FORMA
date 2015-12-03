<center>Voici la liste des formations proposés : </center>
</br>
<table>
	<?php	
	for($i = 0; $i < count($domaine); $i++)
		{
			echo "<tr>";
				
				$idDomaine = $domaine[$i][0];
				?>
				<td> <a href=index.php?uc=formation&idDomaine=<?php echo $idDomaine ?>><?php echo $domaine[$i][1]?></a></td>
				<?php
			echo "</tr>";		
		}
	?>
</table>
