function agregarCategoria() {
    var categoria = $('#nombreCategoria').val();
    if (categoria === "") {
        alert("Debes agregar una categoria");
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: { categoria: categoria },
            url: "../Procesos/categorias/agregarCategoria.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#nombreCategoria').val("");
                    alert("Categoria agregada con éxito");
                } else {
                    alert("Fallo al agregar la fecha");
                }
                
            }
        });
    }
}

function eliminarCategorias(idCategoria) {
    idCategoria = parseInt(idCategoria);
    if (idCategoria < 1) {
        alert("No tienes id de categoria!");
        return false;
    } else {
        var confirmacion = confirm("¿Estás seguro de eliminar esta categoría? Una vez eliminada, no podrá recuperarse.");
        if (confirmacion) {
            $.ajax({
                type: "POST",
                data: { idCategoria: idCategoria },
                url: "../Procesos/categorias/eliminarCategoria.php",
                success: function (respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaCategorias').load("../Vistas/categorias/tablaCategoria.php");
                        alert("Eliminado con éxito!");
                    } else {
                        alert("Fallo al eliminar la categoría :(");
                    }
                }
            });
        }
    }
}

function obtenerDatosCategoria(idCategoria) {
    $.ajax({
        type: "POST",
        data: { idCategoria: idCategoria },
        url: "../Procesos/categorias/obtenerCategoria.php",
        success: function (respuesta) {
            var datosCategoria = JSON.parse(respuesta);
            $('#idCategoria').val(datosCategoria.id_categoria);
            $('#categoriaU').val(datosCategoria.nombre);
        }
    });
}

function actualizaCategoria() {
    if ($('#categoriaU').val() == "") {
        alert("Debes agregar una categoria");
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: $('#frmActualizaCategoria').serialize(),
            url: "../Procesos/categorias/actualizarCategoria.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#tablaCategorias').load("categorias/tablaCategoria.php");
                    $('#btnCerrarActualizarCategoria').click();
                    alert("Actualizado con éxito!");
                } else {
                    alert("Fallo al actualizar la categoría :(");
                }
            }
        });
    }
}