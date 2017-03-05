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
		$palavra 		= $_POST["palavra"];

			
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
				
					function gera($palavra,$transicoes,$estado_inicial){
						
						$atual = $estado_inicial;
						$lista = $estado_inicial.'--';
						for($i = 0; $i< count($palavra);$i++){
							foreach($transicoes as $t){
								$t = explode(':',$t);
								if($t[1] == $palavra[$i] and $t[0] == $atual){
									$atual = $t[2];
									$lista .= $palavra[$i]."--".$atual;
								}
							}
						}
						
						return $lista;
					}
					
					
					var_dump(gera($palavra,$transicoes,$estado_inicial));
					
					function transicao($atual,$alfabeto,$transicoes){
						$destino = '';
						foreach($transicoes as $t){
								$t = explode(':',$t);
								foreach($alfabeto as $char){
									if($t[1] == $char and $t[0] == $atual){
										$destino .= '<td>'.$t[2].'</td>';							
									}
								}
						}
						return $destino;
					}

					foreach($estados as $estado){
						
						$trans = transicao($estado,$alfabeto,$transicoes);

						if($estado == $estado_inicial){
							echo '<tr><th>→' . $estado.'</th>'.$trans.'</tr><br>';
						}
						elseif($estado == $estado_final){
							echo '<tr><th>*' . $estado .'</th>'.$trans.'</tr><br>';
						}
						else{
							echo '<tr><th>' . $estado .'</th>'.$trans.'</tr><br>';
						}
					}
					
				?>
				
	

				
	</table>
	
	<?php } ?>

    