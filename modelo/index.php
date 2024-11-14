<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1b41a5ad09.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function eliminar() {
            var respuesta = confirm("¿Está seguro de querer elimnar el registro?");
            return respuesta
        }
    </script>
    <h1 class="text-center p-3">Módulo de Registro de Usuarios</h1>
    <?php
    include "../modelo/conexion.php";
    include "../controlador/eliminar_persona.php";
    ?>
    <div class="container-fluid row">
        <!-- Cambiado method y corregido el formato de clase -->
        <form class="col-4" method="post">
            <h3 class="text-center text-secondary">Registro de personas</h3>
            <?php
            include "../controlador/registro_persona.php";
            ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="documento" class="form-label">Documento:</label>
                <input type="number" class="form-control" name="documento" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" name="correo" required>
            </div>

            <button type="submit" class="btn btn-primary" name="btnregistrar">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "conexion.php";
                    $sql = $conexion->query("SELECT * FROM tb_persona");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->documento ?></td>
                            <td><?= $datos->fecha_nac ?></td>
                            <td><?= $datos->correo ?></td>
                            <td>
                                <a href="modificar_persona.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>