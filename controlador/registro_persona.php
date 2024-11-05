<?php
// Habilitar la visualización de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["documento"]) && !empty($_POST["fecha"]) && !empty($_POST["correo"])) {
        include "conexion.php"; // Verifica la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error); // Mostrar error de conexión
        }

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $documento = $_POST["documento"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        $sql = $conexion->prepare("INSERT INTO tb_persona (nombre, apellido, documento, fecha_nac, correo) VALUES (?, ?, ?, ?, ?)");
        if (!$sql) {
            die('Error en la preparación de la consulta: ' . $conexion->error); // Mostrar error si la preparación falla
        }

        $sql->bind_param("sssss", $nombre, $apellido, $documento, $fecha, $correo);

        if ($sql->execute()) {
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
            $sql->close();
            header("Location: index.php"); // Redirigir a la página principal (o a donde desees)
            exit(); // Detener la ejecución del script
        } else {
            echo '<div class="alert alert-danger">Error al registrar persona: ' . $sql->error . '</div>'; // Captura y muestra el error
        }
        
        $sql->close();
    } else {
        echo '<div class="alert alert-warning">Uno o más campos están vacíos</div>'; // Mensaje si hay campos vacíos
    }
}
?>
