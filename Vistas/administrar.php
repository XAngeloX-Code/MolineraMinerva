<?php
session_start();
if (isset($_SESSION['usuario'])) {

    include "header.php";
?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Gestor de archivos</h1>
            <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarArchivos">
                <span class="fas fa-plus-circle"></span> Agregar archivo
            </span>
            <div id="tablagestorarchivos"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmArchivos" enctype="multipart/form-data" method="post">
                        <label>Categorias</label>
                        <div id="categoriasLoad"></div>
                        <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivo </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

    <?php include "footer.php"; ?>
    <script src="../Js/administrar.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablagestorarchivos').load("gestor/tablagestor.php");
            $('#categoriasLoad').load("categorias/selectCategorias.php");
            $('#btnGuardarArchivos').click(function() {
                agregarArchivos();
            });
        });
    </script>


<?php
} else {
    header("location:../index.php");
}
