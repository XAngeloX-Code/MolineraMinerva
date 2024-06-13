function agregarArchivos() {
    var formData = new FormData(document.getElementById('frmArchivos'));
    $.ajax({
        url: "../Procesos/administrar/agregarArchivos.php",
        type: "POST",
        datatype: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmArchivos')[0].reset();
                $('#tablaGestorArchivos').load("gestor/tablagestor.php");
                alert("Archivo agregado con éxito");
            } else {
                alert("Fallo al agregar el archivo: " + respuesta);
            }
        }
    });
}

function eliminarArchivo(idArchivo) {
    idArchivo = parseInt(idArchivo);
    if(idArchivo < 1) {
        alert("No tienes id de archivo!");
        return false;   
    }else{
        var confirmacion = confirm("¿Estás seguro de eliminar este archivo? Una vez eliminado, no podrá recuperarse.");
    if(confirmacion){
        $.ajax({
            type: "POST",
            data: { idArchivo: idArchivo },
            url: "../Procesos/administrar/eliminarArchivo.php",
            success: function(respuesta){
                respuesta = respuesta.trim();
                if(respuesta == 1){
                    $('#tablaGestorArchivos').load("gestor/tablagestor.php");
                    alert("Archivo eliminado con éxito!");
                }else{
                    alert("Fallo al eliminar el archivo :");
                }
            }
        })
     }
    }
}

function obtenerArchivoPorId(idArchivo){
    $.ajax({
        type: "POST",
        data: "idArchivo=" + idArchivo,
        url: "../Procesos/administrar/obtenerArchivo.php",
        success: function(respuesta){
            $('#archivoObtenido').html(respuesta);
        }
    })
}