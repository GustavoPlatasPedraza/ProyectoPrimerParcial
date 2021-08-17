<?php $this->load->view("headers/header") ?>
<div class="content">
    <h1>Agregar usuario</h1>
    <form action="<?php echo base_url("insertUsuarios/usuarios") ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <input type="text" name="n_usuario" id="n_usuario" class="form-control" placeholder="Escribe el nombre"><br>
                <input type="text" name="correo" id="correo" class="form-control" placeholder="Escribe el correo">
                <br>
                <select name="id_persona" id="id_persona" class="form-control">
                    <option value="0" disabled selected>Selecciona a una persona</option>
                    <?php
                        foreach($personas as $persona){
                            echo "<option value='".$persona["id"]."'>".$persona["nombre"]." ".$persona["ap_paterno"]." ".$persona["ap_materno"]."</option>";
                        }
                    ?>
                </select>
                <br>
                <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                    <option value="comun">Común</option>
                    <option value="admin">Administrador</option>
                </select>
                <br>
                <br>
                <button type="submit" class="btn btn-success btn-block btn-lg form-control">Agregar persona</button>
            </div>
        </div>
    </form>
</div>
<?php $this->load->view("footers/footer"); ?>