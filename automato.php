	<?php 
		$alfabeto 		= $_POST["alfabeto"];
		$estados 		= $_POST["estados"];
		$transicoes 	= $_POST["transicoes"];
		$estado_inicial = $_POST["estado_inicial"];
		$estado_final 	= $_POST["estado_final"];
				
		$M = [$alfabeto,$estados,$transicoes,$estado_inicial,$estado_final];
	?>
	
	<table class="table">
                 <tr><th>Transições</th>
				 <?php
					$alfabeto = explode(',',$alfabeto);
					for($i = 0; $i < count($alfabeto); $i++)	
							echo '<th>' . $alfabeto[$i] .'</th>';
						
				?>	
				
				</tr>
                <?php						
					$estados = explode(',',$estados);
					for($i = 0; $i < count($estados); $i++)	
							if($estados[$i] == $M[3])
								echo '<tr><th>→' . $estados[$i] .'</th></tr><br>';
							elseif($estados[$i] == $M[4])
								echo '<tr><th>*' . $estados[$i] .'</th></tr><br>';
							else
								echo '<tr><th>' . $estados[$i] .'</th></tr><br>';

				?>	
	</table>

    