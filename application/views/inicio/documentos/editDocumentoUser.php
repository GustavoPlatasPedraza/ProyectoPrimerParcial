<?php $this->load->view("headers/header") ?>
<h1>Editar documento</h1>
<div class="content">
    <div class="col-md-12">
        <form action="<?php echo base_url("actInfo/documentos") ?>" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $documento["id"] ?>">
            <h3>Nombre del documento</h3>
            <input type="text" class="form-control" name="nombre_documento" id="nombre_documento" required value="<?php echo $documento["nombre_documento"] ?>">
            <h3>Tipo de documento</h3>
            <input type="text" class="form-control" name="tipo_documento" id="tipo_documento" required value="<?php echo $documento["tipo_documento"] ?>">
            <hr>
            <div class="row">
                <button type="submit" class="btn btn-success btn-block">Actualizar datos</button>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view("footers/footer") ?>