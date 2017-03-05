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
  <body>
    <form action="index.php" method="post">
	
	<div class="row">
		<div class="col-xs-3 col-sm-2">
			<div class="form-group">
				<label>Alfabeto</label>
				<input type="text" class="form-control" name="alfabeto" placeholder="Alfabeto">
			 </div>
		</div>
		<div class="col-xs-3 col-sm-2">
			<div class="form-group">
				<label>Estados</label>
				<input type="text" class="form-control"  name="estados" placeholder="Estados">
			</div>
		</div>
		
		
		
		<div class="col-xs-3 col-sm-2">
			<div class="form-group">
				<label>Estado Inicial</label>
				<input type="text" class="form-control"  name="estado_inicial" placeholder="Estado Inicial">
			 </div>
		</div>
		
		<div class="col-xs-3 col-sm-2">
			<div class="form-group">
				<label>Estado Final</label>
				<input type="text" class="form-control"  name="estado_final" placeholder="Estado Final">
			</div>
		</div>
		
	</div>
	
	<div class="row">
		<div class="col-xs-9 col-sm-6">
			<div class="form-group">
				<label>Transições</label>
				<input type="text" class="form-control"  name="transicoes" placeholder="Transições">
			</div>
		</div>
		
		<div class="col-xs-3 col-sm-2">
			<div class="form-group">
				<label>Palavra</label>
				<input type="text" class="form-control"  name="palavra" placeholder="Palavra">
			</div>
		</div>

	</div>
	  <button type="submit" class="btn btn-info">Criar</button>
	</form>
	
	<?php 
		include('automato.php');
	?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
