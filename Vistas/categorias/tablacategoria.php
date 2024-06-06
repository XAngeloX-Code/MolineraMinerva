<?php
session_start();
require_once "../../Clases/conexion.php";
$idUsuario = $_SESSION['id_usuario'];
$conexion = new Conectar();
$conexion = $conexion->conexion();

?>

<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaCategoriasDataTable">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Fecha</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT id_categoria, nombre, fecha FROM categorias WHERE id_usuario = :id_usuario";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $mostrar) {
                $idCategoria = $mostrar['id_categoria'];
            ?>
                <tr style="text-align: center;">
                    <td><?php echo $mostrar['nombre']; ?></td>
                    <td><?php echo $mostrar['fecha']; ?></td>
                    <td>
                        <span class="btn btn-warning btn-sm" onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')"
                        data-bs-toggle="modal" data-bs-target="#modalActualizarCategoria">
                            <span class="fas fa-edit"></span>
                        </span>
                    </td>
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="eliminarCategorias('<?php echo $idCategoria ?>')">
                            <span class="fa fa-trash-alt"></span>
                        </span>
                    </td>
                </tr>
            <?php
            }
            $stmt->closeCursor();
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#tablaCategoriasDataTable').DataTable();
    });
</script>