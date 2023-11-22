<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM tbl_productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>clientes</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>nombre_completo</th>
					<th>telefono</th>
					<th>correo</th>
					<th>codigo_postal</th>
					<th>numero_cuenta</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->nombre_completo ?></td>
					<td><?php echo $producto->telefono ?></td>
					<td><?php echo $producto->correo ?></td>
					<td><?php echo $producto->codigo_postal ?></td>
					<td><?php echo $producto->numero_cuenta ?></td>
					
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>