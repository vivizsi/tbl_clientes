<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT tbl_ventas.total, tbl_ventas.fecha, tbl_ventas.id, GROUP_CONCAT(	tbl_productos.codigo, '..', tbl_productos.nombre_completo, '..',  tbl_productos.telefono, '..', tbl_productos.correo, '..',  tbl_productos.codigo_postal, '..', tbl_productos.numero_cuenta  SEPARATOR '__') AS tbl_productos FROM tbl_ventas INNER JOIN tbl_productosvendidos ON tbl_productosvendidos.id_venta = tbl_ventas.id INNER JOIN tbl_productos ON tbl_productos.id = tbl_productosvendidos.id_producto GROUP BY tbl_ventas.id ORDER BY tbl_ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>

					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>nombre_completo</th>
									<th>telefono</th>
									<th>correo</th>
									<th>codigo_postal</th>
									<th>numero_cuenta</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->tbl_productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
									<td><?php echo $producto[3] ?></td>
									<td><?php echo $producto[4] ?></td>
									<td><?php echo $producto[5] ?></td>
				
									
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $venta->id?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>