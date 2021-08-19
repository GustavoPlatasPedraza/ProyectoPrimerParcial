<?php $this->load->view("headers/header") ?>
	<div class="container">
    <h1>Inicio</h1>
	<?php
	echo $_SESSION["tipo"] == 2 ? "<h1>Usted ha iniciado sesion con Google</h1>":"";
	?>
	</div>
	<?php $this->load->view("footers/footer") ?>