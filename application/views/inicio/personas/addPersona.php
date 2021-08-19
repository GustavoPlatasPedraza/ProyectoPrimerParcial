<?php $this->load->view("headers/header") ?>
<div class="content">
    <h1>Agregar persona</h1>
    <form action="<?php echo base_url("insert/personas") ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <label for="">Nombre de la persona</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe el nombre" required><br>
                <label for="">Apellido paterno</label>
                <input type="text" name="ap_paterno" id="ap_paterno" class="form-control" placeholder="Escribe el apellido paterno" required><br>
                <label for="">Apellido materno</label>
                <input type="text" name="ap_materno" id="ap_materno" class="form-control" placeholder="Escribe el apellido materno" required><br>
                <button type="submit" class="btn btn-success btn-block form-control">Agregar persona</button>
            </div>
        </div>
    </form>
</div>
<?php $this->load->view("footers/footer") ?>