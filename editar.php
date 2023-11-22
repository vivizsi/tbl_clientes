<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="codigo">Código del cliente:</label>
			<input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

			<label for="nombre_completo">nombre completo:</label>
			<input value="<?php echo $producto->nombre_completo ?>" class="form-control" name="nombre_completo" required type="text" id="nombre_completo" placeholder="Escribe el nombre_completo">

			<label for="telefono">telefono:</label>
			<input value="<?php echo $producto->telefono ?>" id="telefono" name="telefono" class="form-control" required type="text" placeholder="Escribe el paquete y recarga">

			<label for="correo">correo:</label>
			<input value="<?php echo $producto->correo ?>" class="form-control" name="correo" required type="text" id="correo" placeholder="Escribe el correo">

			<label for="codigo_postal">codigo_postal:</label>
			<input value="<?php echo $producto->codigo_postal ?>" id="codigo_postal" name="codigo_postal" class="form-control" required type="text" placeholder="Escribe el codigo_postal">

			<label for="numero_cuenta">numero de cuenta:</label>
			<input value="<?php echo $producto->numero_cuenta ?>" class="form-control" name="numero_cuenta" required type="text" id="numero_cuenta" placeholder="Escribe el id_accesorio">

			
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
