<?php
session_start();
include_once('conexion.php');

if (isset($_POST['edit'])) {
    # code...
    $database = new ConectarBD();
    $db = $database->open();
    try {
        //code...
        $id = $_GET['id'];
        $nombrec = $_POST['nombrecontacto'];
        $telefono = $_POST['celular'];
        $correoc = $_POST['email'];
        $direccionc = $_POST['direccion'];
        //$stmt = $db->prepare("INSERT INTO personas(Nombre,Telefono,Correo,Direccion) VALUES(:nombrecontacto,:celular,:email,:direccion)");

        $sql="UPDATE personas SET Nombre='$nombrec',Telefono='$telefono',Correo='$correoc',Direccion='$direccionc' WHERE idPersona='$id'";
        $_SESSION['message'] = ($db->exec($sql)) ? 'Datos actualizados correctamente' : 'Algo salio mal, no se pudo actualizar correcctamente';
    } catch (PDOException $e) {
        //throw $th;
        $_SESSION['message'] = $e->getMessage();
    }
    $database->close();
} else {
    # code...
    $_SESSION['message'] = 'Rellene el formulario';
}
header('location:index.php');
