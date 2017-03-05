	<?php 

		$estados = "";
		$alfabeto = "";
		$M = "";

		if (!empty($_POST)) {
			$alfabeto 		= $_POST["alfabeto"];
			$estados 		= $_POST["estados"];
			$transicoes 	= $_POST["transicoes"];
			$estado_inicial = $_POST["estado_inicial"];
			$estado_final 	= $_POST["estado_final"];

			$transicoes = explode(',',$transicoes);

			$array = array();

			for($i = 0; $i < count($transicoes); $i++)	{

				$chave=substr($transicoes[$i], 0, 4);
				$valor=substr($transicoes[$i], 6, 7);

				$array[$chave] = $valor;
				
			}


			$M = [$alfabeto,$estados,$transicoes,$estado_inicial,$estado_final];

			echo "Alfabeto = ".$M[0]." ";
			echo "Estados = ".$M[1]." ";
			echo "Transições = ";
			var_dump($array);
			echo "Estado inicial = ".$M[3]." ";
			echo "Estado final= ".$M[4]." ";

			echo "Resultado da primeira transição: ".$array["s0-a"]." ";
			
		}
		

		
	?>


	

	<?php
	if (!empty($M)) {
	?>

	<table class="table">
                 <tr><th>Transições</th>
				 <?php
					$alfabeto = explode(',',$alfabeto);
					for($i = 0; $i < count($alfabeto); $i++) {
						echo '<th>' . $alfabeto[$i] .'</th>';
					}
				?>	
				
				</tr>
                <?php						
					$estados = explode(',',$estados);
					for($i = 0; $i < count($estados); $i++)	{
						if($estados[$i] == $M[3])
							echo '<tr><th>→' . $estados[$i] .'</th></tr><br>';
						elseif($estados[$i] == $M[4])
							echo '<tr><th>*' . $estados[$i] .'</th></tr><br>';
						else
							echo '<tr><th>' . $estados[$i] .'</th></tr><br>';
					}
				?>	
	</table>

	<?php } ?>

    