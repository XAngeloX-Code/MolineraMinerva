<?php include "header.php"; ?>

<div id="tablagestorarchivos"></div>

<?php include "footer.php"; ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablagestorarchivos').load("gestor/tablagestor.php");
    });
</script>

