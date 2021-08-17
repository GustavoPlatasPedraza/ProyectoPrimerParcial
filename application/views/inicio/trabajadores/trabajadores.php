<?php $this->load->view("headers/header") ?>
	<div class="container">
    <h1>Trabajadores</h1>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Id Departamento</th>
                <th>Puesto</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($_SESSION["trabajadores"] as $trabajadores){
                    ?>
                    <tr>
                        <td><?php echo $trabajadores["id"] ?></td>
                        <td><?php echo $trabajadores["id_departamento"] ?></td>
                        <td><?php echo $trabajadores["puesto"] ?></td>
                        <td><?php echo $trabajadores["estado"] ?></td>
                        <td><a href="<?php echo base_url("editTrabajador/".$trabajadores["id"]) ?>"><button class="btn btn-warning">Editar</button></a></td>
                        <td><a href="<?php echo base_url("deleteTrabajador/".$trabajadores["id"]) ?>"><button class="btn btn-danger">Eliminar</button></a></td>
                    </tr>
                    <?php
                }
                    ?>
        </tbody>
    </table>
    <div class="row">
        <a href="<?php echo base_url("addTrabajador") ?>" class="btn btn-block btn-success btn-lg">Agregar trabajador</a>
    </div>
	</div>
    <script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    </script>
    <script type="text/javascript">
    var id_delete = "<?php echo $this->session->flashdata('id_delete'); ?>"
    </script>
	<?php $this->load->view("footers/footer") ?>
    <script src="<?php echo base_url("resources/js/deleteTrabajadores.js")?>"></script>