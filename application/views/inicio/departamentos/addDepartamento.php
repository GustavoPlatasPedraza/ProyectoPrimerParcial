<?php $this->load->view("headers/header") ?>
<div class="content">
    <h1>Agregar Departamento</h1>
    <form action="<?php echo base_url("insert/departamentos") ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <label for="">Departamento</label>
                <input type="text" name="nombre_departamento" id="nombre_departamenmto" class="form-control" placeholder="Escribe el nombre del departamento"><br>
                <button type="submit" class="btn btn-success btn-block form-control">Agregar Departamento</button>
            </div>
        </div>
    </form>
</div>
<?php $this->load->view("footers/footer") ?>