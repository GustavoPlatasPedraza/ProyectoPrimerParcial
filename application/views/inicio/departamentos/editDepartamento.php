<?php $this->load->view("headers/header") ?>
	<div class="container">
        <h1>Editar Departamentos</h1>
        <form action="<?php echo base_url("actInfoDepartamentos") ?>" method="post">
            <input type="hidden" name="id" id="id" value="<?php print_r($_SESSION["datosEditDepartamentos"]["id"]); ?>">
            <label for="">Nombre del departamento</label>
            <input type="text" class="form-control" name="nombre_departamento" id="nombre_departamento" value="<?php echo $_SESSION["datosEditDepartamentos"]["nombre_departamento"] ?>"> <br>
            <button type="submit" class="btn btn-success btn-block btn-lg">Actualizar datos</button>
        </form>
    
	</div>
	<?php $this->load->view("footers/footer") ?>
