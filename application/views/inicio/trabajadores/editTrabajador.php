<?php $this->load->view("headers/header") ?>
	<div class="container">
        <h1>Editar Trabajadores</h1>
        <form action="<?php echo base_url("actInfoTrabaajdores") ?>" method="post">
            <input type="hidden" name="id" id="id" required value="<?php print_r($_SESSION["datosEditTrabajadores"]["id"]); ?>">
            <label for="">Departamento</label>
            <input type="text" class="form-control" required name="id_departamento" id="id_departamento" value="<?php echo $_SESSION["datosEditTrabajadores"]["id_departamento"] ?>"> <br>
            <label for="">Puesto</label>
            <input type="text" class="form-control" required name="puesto" id="puesto" value="<?php echo $_SESSION["datosEditTrabajadores"]["puesto"] ?>"> <br>
            <label for="">Estado</label>
            <input type="text" class="form-control" required name="estado" id="estado" value="<?php echo $_SESSION["datosEditTrabajadores"]["estado"] ?>"> <br>
            <hr>
            <div class="row">
            <button type="submit" class="btn btn-success btn-block">Actualizar datos</button>
            </div>
        </form>
    
	</div>
	<?php $this->load->view("footers/footer") ?>