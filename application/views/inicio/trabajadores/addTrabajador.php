<?php $this->load->view("headers/header") ?>
<div class="content">
    <h1>Agregar Trabajador</h1>
    <form action="<?php echo base_url("insertTrabajador/trabajadores") ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <label for="">Persona</label>
                <select name="id_persona" id="id_persona" class="form-control">
                    <option value="0" disabled selected>Selecciona a una persona</option>
                    <?php
                        foreach($personas as $persona){
                            echo "<option value='".$persona["id"]."'>".$persona["nombre"]." ".$persona["ap_paterno"]." ".$persona["ap_materno"]."</option>";
                        }
                    ?>
                </select>
                <br>
                <label for="">Departamento</label>
                <select name="id_departamento" id="id_departamento" class="form-control">
                 <option value="0" disabled selected>Selecciona un departamento</option>
                    <?php
                    foreach($departamentos as $departamento){
                  echo "<option value='".$departamento["id"]."'>".$departamento["nombre_departamento"]."</option>";
                 }
                 ?>
    </select><br>
                <label for="">Puesto</label>
                <input type="text" name="puesto" id="puesto" class="form-control" placeholder="Escribe el nombre del puesto" required><br>
                <button type="submit" class="btn btn-success btn-block form-control">Agregar trabajador</button>
            </div>
        </div>
    </form>
</div>
<?php $this->load->view("footers/footer") ?>