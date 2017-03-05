	<?php 
	
		$estados = "";
		$alfabeto = "";
		$M = "";
		
		if (!empty($_POST)) {

		$alfabeto 		= explode(',',$_POST["alfabeto"]);
		$estados 		= explode(',',$_POST["estados"]);
		$transicoes 	= explode(',',$_POST["transicoes"]);
		$estado_inicial = $_POST["estado_inicial"];
		$estado_final 	= $_POST["estado_final"];
			
		$M = [$alfabeto,$estados,$transicoes,$estado_inicial,$estado_final];
		}
				
	?>
	
	<?php if (!empty($M)){ ?>
	
	<table class="table">
                 <tr><th>Transições</th>
				 <?php
					foreach($alfabeto as  $char)	
							echo '<th>' . $char .'</th>';
						
				?>	
				</tr>
                <?php	
					function transicao($atual,$alfabeto,$transicoes){
						$destino = '';
						foreach($transicoes as $t){
								$t = explode(':',$t);
								foreach($alfabeto as $char){
									if($t[1] === $char && $t[0] === $atual){
										$destino .= '<td>'.$t[2].'</td>';							
									}
								}
						}
						return $destino;

					}
							
					foreach($estados as $estado){
						var_dump(transicao($estado,$alfabeto,$transicoes));
						if($estado === $estado_inicial){
							echo '<tr><th>→' . $estado.'</th>'.transicao($estado,$alfabeto,$transicoes).'</tr><br>';
						}
						elseif($estado === $estado_final){
							echo '<tr><th>*' . $estado .'</th>'.transicao($estado,$alfabeto,$transicoes).'</tr><br>';
						}
						else{
							echo '<tr><th>' . $estado .'</th>'.transicao($estado,$alfabeto,$transicoes).'</tr><br>';
						}
					}
					
					
					
				?>
				
	

				
	</table>
	
	<?php } ?>

    