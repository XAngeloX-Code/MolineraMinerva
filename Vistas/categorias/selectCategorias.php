<?php
    session_start();
    require_once "../../Clases/conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario = $_SESSION['id_usuario'];
    $sql = "SELECT id_categoria, nombre FROM categorias WHERE id_usuario = '$idUsuario'";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    ?>

<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
    <?php 
        while($mostrar = $stmt->fetch(PDO::FETCH_ASSOC)){
        $idCategoria = $mostrar['id_categoria'];
    ?>
    <option value="<?php echo $idCategoria ?>"><?php echo $mostrar['nombre']; ?></option>
    <?php
        }
    ?>
</select>