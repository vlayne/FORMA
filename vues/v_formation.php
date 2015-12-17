
<div class="container">
  <h2>Formations proposés</h2>    
  <?php /*
    $boole = true;
	for($i = 0; $i < count($formation); $i++)
		{

		for($j = 3; $j < 10; $j++)
			{	
				//S'il n'y a plus de places
				if(!(!$formation[$i][5] == 0 && $formation[$i][7] >= date("Y-m-d")))
				{
					$boole = false;
				}
								
			}
		}	
  */if(count($formation) == 0 ) { 
  			echo '<h3>Aucune données</h3>';
  		} else { ?>                         
  <div class="table-responsive">          
  <table id="tableauFormation" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
      <tr>
        <th>Nom de la formation</th>
		<th>Coût de la formation</th>
		<th>Nombre de place restante</th>
		<th>Lieu de la formation</th>
		<th>Jour de la formation</th>
		<th>Heure de commencement</th>
		<th>Heure de fin</th>
		<th></th>
      </tr>
    </thead>
    <tbody>
        <?php		
		for($i = 0; $i < count($formation); $i++)
		{			
			echo "<tr>";
			for($j = 3; $j < 10; $j++)
			{	
				//S'il n'y a plus de places
				if(!$formation[$i][5] == 0 /*&& $formation[$i][7] >= date("Y-m-d") */)
				{
					echo "<td>".$formation[$i][$j]. "</td>";
					$dom = $formation[$i][0];
					$forma = $formation[$i][1];
					$session = $formation[$i][2];
					
				}
								
			}
			//S'il n'y a plus de places
			if(!$formation[$i][5] == 0 /* && $formation[$i][7] >= date("Y-m-d") */)
			{
				if(isset($_SESSION['connecter']))
				{	
					?>
					<td><form method='post' action =index.php?uc=inscrireFormation&domaine=<?php echo $dom ?>&formation=<?php echo $forma ?>&session=<?php echo $session ?>>
					 <input type='submit' value="s'inscrire" ></form></td>				
					<?php
				}
				
			}
		}
			echo "</tr>";
		?>
    </tbody>
  </table>
  </div>
</div>
<?php } ?>
<script>
$(document).ready(function() {
    $('#tableauFormation').DataTable();
} );
</script>