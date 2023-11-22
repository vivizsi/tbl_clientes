<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["nombre_completo"]) || !isset($_POST["telefono"]) || !isset($_POST["correo"]) || !isset($_POST["codigo_postal"]) || !isset($_POST["numero_cuenta"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$nombre_completo = $_POST["nombre_completo"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$codigo_postal = $_POST["codigo_postal"];
$numero_cuenta = $_POST["numero_cuenta"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_productos(codigo, nombre_completo, telefono, correo, codigo_postal, numero_cuenta) VALUES (?, ?, ?, ?, ?, ?)");
$resultado = $sentencia->execute([$codigo, $nombre_completo, $telefono, $correo, $codigo_postal, $numero_cuenta]);


if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>