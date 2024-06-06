<?php
session_start();
if (isset($_SESSION['usuario'])) {
    include "header.php";
?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Categorías</h1>
            <div class="row">
                <div class="row">
                    <div class="col-sm-4">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregaCategoria">
                            <span class="fas fa-plus-circle"></span> Agregar nueva categoria
                        </button>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAgregaCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nueva Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmCategorias">
                        <label>Nombre de la Categoria</label>
                        <input type="text" id="nombreCategoria" name="nombreCategoria" class="form-control form-control-sm" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Categoria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmActualizaCategoria">
                        <input type="text" id="idCategoria" name="idCategoria" hidden="">
                        <label>Categoria</label>
                        <input type="text" id="categoriaU" name="categoriaU" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCerrarActualizarCategoria">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnactualizarCategoria">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>

    <script src="../Js/categorias.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablaCategorias').load("categorias/tablacategoria.php");
            $('#btnGuardarCategoria').click(function() {
                agregarCategoria();
            });
            $('#btnactualizarCategoria').click(function() {
                actualizaCategoria();
            });
        });
    </script>

<?php
} else {
    header("location: ../index.php");
}
?>