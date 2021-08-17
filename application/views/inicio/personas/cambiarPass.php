<?php $this->load->view("headers/header")?>
<div class= "contten">
<div class= "col-md-12">
<form action="<?php echo base_url("updatePass")?>" methos="post">
<div class="row">
<label for="">Nueva contrasaeña</label>
<input type="text" name="conf" id="conf" class="form-control"><br>
</div>
<div class="row"> 
<label for="">Confirmar contraseña</label>
<input type="text" name="conf" id="conf" class="form-control"><br>
</div>
<div class="row">
<br>
<button type="submit" class="btn btn-block btn-lg btn-success">Cambiar contraseña</button>
</div>
</from>
</div>
</div>
<script type="text/javascript"> var base_url = "<?php echo base_url(); ?>"</script>
<?php $this->load->view("footers/footer")?>