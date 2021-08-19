<?php $this->load->view("headers/header");?>
    <div class="container">
        <h1>Editar Usuario</h1>
        <form action="<?php echo base_url("actInfoUsuarios"); ?>" method="post">
        <input class="form-control" type="hidden" name="id" id="id" value="<?php print_r($_SESSION["datosEditUsuario"]["id"]); ?>">
        <input class="form-control" type="text" name="n_usuario" required id="n_usuario" value="<?php print_r($_SESSION["datosEditUsuario"]["n_usuario"]); ?>"><br>
        <select class="form-control" name="tipo_usuario" id="tipo_usuario">
        <?php 
            if ($_SESSION["datosEditUsuario"]["tipo_usuario"] == "admin") {
                ?>
                <option value="Admin">Administrador</option>
                <option value="comun">Común</option>
                <?php 
            }else {?>
                <option value="comun">Común</option>
                <option value="Admin">Administrador</option>
                <?php 
            }
         ?>
        </select>
        <hr>
        <div class="row">
            <button type="submit" class="btn btn-success btn-block">Actualizar datos</button>
        </div>
        </form>
    </div>
<?php $this->load->view("footers/footer");?>