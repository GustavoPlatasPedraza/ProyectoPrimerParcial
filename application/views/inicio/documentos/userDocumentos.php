<?php $this->load->view("headers/header"); ?>
<div class="container">
<h1>Mis archivos</h1>

    <div class="row">
<table class="table table-dark table-striped">
        <thead>
            <tr style="text-align: center;">
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th colspan="2" style="text-align: center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($_SESSION["documentos"] as $documento){
                    ?>
                    <tr style="text-align: center;">
                        <td><?php echo $documento["id"] ?></td>
                        <td><?php echo $documento["nombre_documento"] ?></td>
                        <td><?php echo $documento["tipo_documento"] ?></td>
                        <td><a href="<?php echo base_url("editDocumentoUser/".$documento["id"]) ?>"><button class="btn btn-warning">Editar</button></a></td>
                        <td><a href="<?php echo base_url("confirmDocumentoComun/".$documento["id"]) ?>"><button class="btn btn-danger">Eliminar</button></a></td>
                    </tr>
                    <?php
                }
                    ?>
        </tbody>
    </table>
    <a href="<?php echo base_url("addDocumentoUser") ?>" class="btn btn-block btn-success btn-lg">Agregar documento</a>
</div>
</div>
<?php $this->load->view("footers/footer"); ?>