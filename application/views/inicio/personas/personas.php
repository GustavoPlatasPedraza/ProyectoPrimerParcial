<?php $this->load->view("headers/header") ?>
<div class="container">
<h1>Personas</h1>
<div class="row">
<table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($_SESSION["personas"] as $personas){
                    ?>
                    <tr>
                        <td><?php echo $personas["id"] ?></td>
                        <td><?php echo $personas["nombre"] ?></td>
                        <td><?php echo $personas["ap_paterno"] ?></td>
                        <td><?php echo $personas["ap_materno"] ?></td>
                        <td><a href="<?php echo base_url("editPersona/".$personas["id"]) ?>"><button class="btn btn-warning">Editar</button></a></td>
                        <td><a href="<?php echo base_url("deletePersonas/".$personas["id"]) ?>"><button class="btn btn-danger">Eliminar</button></a></td>
                    </tr>
                    <?php
                }
                    ?>
        </tbody>
    </table>
    <a href="<?php echo base_url("addPersona") ?>" class="btn btn-block btn-success btn-lg">Agregar persona</a>
</div>
</div>
<?php $this->load->view("footers/footer") ?>
