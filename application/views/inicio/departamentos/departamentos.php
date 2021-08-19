<?php $this->load->view("headers/header") ?>
<div class="container">
<h1>Departamentos</h1>
<div class="row">
<table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Nombre del Departamento</th>
                <th>Fecha de Registro</th>
				<th>Hora de Registro</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($_SESSION["departamentos"] as $departamentos){
                    ?>
                    <tr>
                        <td><?php echo $departamentos["id"] ?></td>
                        <td><?php echo $departamentos["estado"] ?></td>
						<td><?php echo $departamentos["nombre_departamento"] ?></td>
						<td><?php echo $departamentos["fecha_registro"] ?></td>
						<td><?php echo $departamentos["hora_registro"] ?></td>
                        <td><a href="<?php echo base_url("editDepartamento/".$departamentos["id"]) ?>"><button class="btn btn-warning">Editar</button></a></td>
                        <td><a href="<?php echo base_url("deleteDepartamento/".$departamentos["id"]) ?>"><button class="btn btn-danger">Eliminar</button></a></td>
                    </tr>
                    <?php
                }
                    ?>
        </tbody>
    </table>
    <a href="<?php echo base_url("addDepartamento") ?>" class="btn btn-block btn-success btn-lg">Agregar Departamento</a>
</div>
</div>
<?php $this->load->view("footers/footer") ?>
