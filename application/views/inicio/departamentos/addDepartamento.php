<?php $this->load->view("headers/headers") ?>
<div class="content">
    <h1>Agregar Departamento</h1>
    <form action="<?php echo base_url("insertDepartamentos/departamentos") ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <input type="text" name="nombre_departamento" id="nombre_departamenmto" class="form-control" placeholder="Escribe del departamento"><br>
                <button type="submit" class="btn btn-success btn-block btn-lg form-control">Agregar Departamento</button>
            </div>
        </div>
    </form>
</div>
<?php $this->load->view("footers/footer") ?>