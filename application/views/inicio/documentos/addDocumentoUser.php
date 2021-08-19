<?php $this->load->view("headers/header") ?>
<div class="container">
<h1>Agregar documento</h1>
<div class="row">
    <form action="<?php echo base_url("insertComun/documentos") ?>" method="post">
    <input type="text" hidden id="id_persona" name="id_persona" value="<?php echo $_SESSION["id_persona"] ?>">
    <h3>Nombre del documento</h3>
    <input type="text" class="form-control" name="nombre_documento" id="nombre_documento" placeholder="Escribe el nombre del documento" required>
    <h3>Tipo de documento</h3>
    <input type="text" class="form-control" name="tipo_documento" id="tipo_documento" placeholder="Escriba el tipo de documento" required>
    <hr>
    <div class="row">
        <button type="submit" class="btn btn-success btn-block">Añadir documento</button>
    </div>
    </form>
</div>

</div>
<?php $this->load->view("footers/footer") ?>