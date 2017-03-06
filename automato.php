<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  </head>

	<?php 

	session_start();

		$estados = "";
		$alfabeto = "";
		$M = "";
		
		if (!empty($_POST)) {

			if (isset($_POST['form_palavras'])) {
				
				$contador = $_POST['contador'];
				
				for ($i=0; $i < $contador; $i++) { 
					$palavras[] = $_POST['palavra_'.$i];
				}

				$alfabeto = $_SESSION['alfabeto'];
				$estados = $_SESSION['estados'];
				$transicoes = $_SESSION['transicoes'];
				$estado_inicial = $_SESSION['estado_inicial'] ;
				$estado_final = $_SESSION['estado_final'] ;
				$palavra = $_SESSION['palavra'];

			}
			
			if (isset($_POST['form_automato'])) {
				$alfabeto = explode(',',$_POST["alfabeto"]);
				$estados = explode(',',$_POST["estados"]);
				$transicoes 	= explode(',',$_POST["transicoes"]);
				$estado_inicial = $_POST["estado_inicial"];
				$estado_final 	= $_POST["estado_final"];


				$_SESSION['alfabeto'] = $alfabeto;
				$_SESSION['estados'] = $estados;
				$_SESSION['transicoes'] = $transicoes;
				$_SESSION['estado_inicial'] = $estado_inicial;
				$_SESSION['estado_final'] = $estado_final;

			}	

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
					function gera($palavra,$transicoes,$estado_inicial,$estado_final){
						$atual = $estado_inicial;
						$lista = $estado_inicial;
						for($i = 0; $i< strlen($palavra);$i++){
							foreach($transicoes as $t){
								$t = explode(':',$t);
								if($t[0] == $atual && $t[1] == $palavra[$i]){
									$atual = $t[2];
									$lista .= "-->".$palavra[$i]."-->".$atual;
									break;
								}
							}
						}
						if($atual == $estado_final)
							return $lista." Cadeia reconhecida";
						else
							return $lista." Cadeia não reconhecida";

					}
					
					if (isset($_POST['form_palavras'])) {
						foreach ($palavras as $palavra) {
							var_dump(gera($palavra,$transicoes,$estado_inicial,$estado_final));
						}
						
					}

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
<!-- 	<form action="automato.php" method="post">
	
		<div class="row">
			<div class="col-xs-3 col-sm-2">
				<div class="form-group">
					<label>Palavra</label>
					<input type="text" class="form-control"  name="palavra" placeholder="Palavra">
				</div>
			</div>
		</div>
		
		<button type="submit" class="btn btn-info">Criar</button>
	</form> -->

	<input type="button" id="btnAdd" name="1" value="Adicionar palavra">
	
	<input type="hidden" id="valor" name="valor" value="0">

	<form id="form_palavras" action="automato.php" method="post">
		<input type="hidden" name="form_palavras" value="1"/>
		<input type="hidden" id="contador" name="contador" value="0">

		<p id="palavras">Palavras: </p>
		<button type="submit" class="btn btn-info">Criar</button>
	</form>

	

	<script>

		function add(type) {
		  //Create an input type dynamically.
		  var contador = parseInt(document.getElementById("contador").value);   
		  contador++;

		  document.getElementById("contador").value = contador;

		  var element = document.createElement("input");

		  var valor = parseInt(document.getElementById("valor").value);

		  var i = valor;

		  valor = valor + 1;
		  document.getElementById("valor").value = valor;

		  //Assign different attributes to the element. 
		  element.type = "text";
		  element.value = " "; // Really? You want the default value to be the type string?
		  element.name = "palavra_"+i; // And the name too?

		  // element.onclick = function() { // Note this is a function
		  //   alert("blabla");
		  // };

		  var palavras = document.getElementById("palavras");
		  //Append the element in page (in span).  
		  palavras.appendChild(element);
		}

		
		document.getElementById("btnAdd").onclick = function() {
		  add("palavra");
		};

</script>
	
	<?php } ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


    