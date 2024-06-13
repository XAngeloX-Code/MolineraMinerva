<?php
SESSION_START();
require_once "../../Clases/conexion.php";
$c = new Conectar();
$conexion = $c->conexion();
$idUsuario = $_SESSION['id_usuario'];
$sql = "SELECT 
    archivos.id_archivo as idArchivo,
    usuarios.nombre as nombreUsuario,
    categorias.nombre as categoria,
    archivos.nombre as nombreArchivo,
    archivos.tipo as tipoArchivo,
    archivos.ruta as rutaArchivo,
    archivos.fecha as fecha
    FROM
    archivos 
    INNER JOIN usuarios ON archivos.id_usuario = usuarios.id_usuario
    INNER JOIN categorias ON archivos.id_categoria = categorias.id_categoria
    and archivos.id_usuario = '$idUsuario'";

$stmt = $conexion->prepare($sql);
$respuesta = $stmt->execute();
?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover" id="tablagestordatatable">
                <thead class="table-dark">
                    <tr>
                        <th>Categoria</th>
                        <th>Nombre</th>
                        <th>Tipo de archivo</th>
                        <th>Descargar</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $tipoArchivoValidos = array('png','jpg', 'pdf' , 'docx', 'pptx' , 'xlsx');

                    while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)){

                        $rutaDescarga = "../../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                ?>
                    <tr>
                        <td><?php echo $mostrar['categoria']; ?></td>
                        <td><?php echo $mostrar['nombreArchivo']; ?></td>
                        <td><?php echo $mostrar['tipoArchivo']; ?></td>
                        <td>
                            <a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
                                <span class="fa-solid fa-download"></span>
                            </a>
                        </td>
                        <td>
                            <?php
                                for($i = 0; $i < count($tipoArchivoValidos); $i++){
                                    if($tipoArchivoValidos[$i] == $mostrar['tipoArchivo']){
                            ?>
                            <span class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#visualizarArchivo" 
                            onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">
                                <span class="fa-solid fa-eye"></span>
                            </span>
                            <?php
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
                                <span class="fa-solid fa-trash"></span>
                            </span>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../../Js/administrar.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablagestordatatable').DataTable();
    })
</script>