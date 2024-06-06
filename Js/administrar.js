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
                $('#tablaGestorArchivos').load("gestor/tablagestor.php");
                alert("Archivo agregado con éxito");
            } else {
                alert("Fallo al agregar el archivo: " + respuesta);
            }
        }
    });
}
