<?php
include "../modelo/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("select * from tb_persona where id = $id");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificar_personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <form class="col-4 p-3 m-auto" method="post">
        <h3 class="text-center text-secondary">Modificar Registros</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"]?>">
        <?php
        include "../controlador/actualizar_persona.php";
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required value="<?=$datos->nombre?>">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" name="apellido" required value="<?=$datos->apellido?>">
            </div>
            <div class="mb-3">
                <label for="documento" class="form-label">Documento:</label>
                <input type="number" class="form-control" name="documento" required value="<?=$datos->documento?>">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="fecha" required value="<?=$datos->fecha_nac?>">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" name="correo" required value="<?=$datos->correo?>">
            </div>
        <?php }
        ?>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar Usuario</button>
    </form>
</body>

</html>