<?php $this->load->view("headers/header");?>
<div class="container">
<h1>Usuarios</h1>
<div class="row">
<table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de usuario</th>
                <th>Tipo usuario</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach ($_SESSION["usuarios"] as $usuarios) {
                ?>
                    <tr>
                        <td><?php echo $usuarios["id"];?></td>
                        <td><?php echo $usuarios["n_usuario"];?></td>
                        <td><?php if($usuarios["tipo_usuario"] == 1){
                            echo "Admin";
                        }else {
                            echo "Común";
                        }?></td>
                        <td><a href="<?php echo base_url("editUsuario/".$usuarios["id"]) ?>"><button class="btn btn-warning">Editar</button></a></td>
                        <td><a href="<?php echo base_url("deleteUsuario/".$usuarios["id"]); ?>"><button class="btn btn-danger">Eliminar</button></a></td>
                    </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
    <a href="<?php echo base_url("addUsuario"); ?>" class="btn btn-block btn-success btn-lg">Agregar usuario</a>
</div>
</div>
<?php $this->load->view("footers/footer");?>
