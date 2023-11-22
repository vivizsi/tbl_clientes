<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="codigo">Código del cliente:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

		<label for="nombre_completo">nombre_completo:</label>
		<input class="form-control" name="nombre_completo" required type="text" id="nombre_completo" placeholder="Escribe el nombre_completo">

		<label for="telefono">telefono:</label>
		<input class="form-control" required type="text" id="telefono" name="telefono" placeholder="Escribe las telefono">

		<label for="correo">correo:</label>
		<input class="form-control" name="correo" required type="text" id="correo" placeholder="Escribe el correo">

		<label for="codigo_postal">codigo_postal:</label>
		<input class="form-control" required type="text" id="codigo_postal" name="codigo_postal" placeholder="Escribe el codigo_postal">

		<label for="numero_cuenta">numero_cuenta:</label>
		<input class="form-control" name="numero_cuenta" required type="text" id="numero_cuenta" placeholder="Escribe el numero_cuenta">

		
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>