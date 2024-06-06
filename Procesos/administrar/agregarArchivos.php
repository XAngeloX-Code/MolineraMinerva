<?php
    session_start();
    require_once "../../Clases/administrar.php";
    $Administrar = new Administrar();
    $idCategoria = $_POST['categoriasArchivos'];
    $idUsuario = $_SESSION['id_usuario'];

 if($_FILES['archivos']['size'] > 0){
    $carpetaUsuario = '../../archivos/'.$idUsuario;//ruta de la carpeta
    if(!file_exists($carpetaUsuario)){
        mkdir($carpetaUsuario, 0777, true);
    }
    $totalArchivos = count($_FILES['archivos']['name']);
    for($i=0; $i < $totalArchivos; $i++){
        $nombreArchivo = $_FILES['archivos']['name'][$i];
        $explode = explode('.', $nombreArchivo);
        $tipoArchivo = array_pop($explode);

        $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
        $rutaFinal = $carpetaUsuario . "/" . $nombreArchivo;

        $datosRegistro = array(
            "idUsuario" => $idUsuario,
            "idCategoria" => $idCategoria,
            "nombre" => $nombreArchivo,
            "tipo" => $tipoArchivo,
            "ruta" => $rutaFinal
        );

        if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
            $respuesta = $Administrar->agregarArchivos($datosRegistro);
        }
       
    }
    echo $respuesta;
 }else{
    echo 0;
 }

?>