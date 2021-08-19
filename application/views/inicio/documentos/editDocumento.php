<?php $this->load->view("headers/header") ?>
<div class="container">
<h1>Editar documento</h1>
        <form action="<?php echo base_url("actInfo/documentos") ?>" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $documento["id"] ?>">
            <h3>Persona</h3>
            <select name="id_persona" id="id_persona" class="form-control">
                <?php
                    foreach($_SESSION["personas"] as $persona){
                        $nombre_completo = $persona["nombre"]." ".$persona["ap_paterno"]." ".$persona["ap_materno"];
                        if($persona["id"] == $documento["id_persona"]){
                            echo "<option selected value='".$persona["id"]."'>".$nombre_completo."</option>";
                        }else{
                            echo "<option value='".$persona["id"]."'>".$nombre_completo."</option>";
                        }
                    }
                ?>
            </select>
            <h3>Nombre del documento</h3>
            <input type="text" class="form-control" name="nombre_documento" id="nombre_documento" required value="<?php echo $documento["nombre_documento"] ?>">
            <h3>Tipo de documento</h3>
            <input type="text" class="form-control" name="tipo_documento" id="tipo_documento" required value="<?php echo $documento["tipo_documento"] ?>">
            <hr>
            <div class="row">
            <button type="submit" class="btn btn-success btn-block">Actualizar datos</button>
            </div>
        </form>
</div>
<?php $this->load->view("footers/footer") ?>