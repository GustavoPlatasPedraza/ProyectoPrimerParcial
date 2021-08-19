<?php
if(!isset($_SESSION["id"])){
    redirect(base_url());
}
?>


<!DOCTYPE html>
<html lang="es-MX">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url("resources/css/inicio/index.css"); ?>">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<title>Módulo</title>
</head>

<body>
	<div class="l-navbar" id="nav-bar">
		<nav class="nav">
			<div>
				<a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> 
                <span class="nav_logo-name">Inicio</span> </a>
                <!--Admin -->
                <?php
                if($_SESSION["tipo"] == 1){
                    ?>
                    <div class="nav_list">
					<a href="<?php echo base_url("adminDocumentos") ?>" class="nav_link active" title="Documentos">
						<i class='bx bx-book-open nav_icon'></i>
						<span class="nav_name">Documentos</span>
					</a>
					<a href="<?php echo base_url("adminPersonas")?>" class="nav_link" title="Personas"> 
                        <i class='bx bx-male nav_icon'></i> 
                        <span class="nav_name">Personas</span> 
                    </a> 
                    <a href="<?php echo base_url("trabajadores")?>" class="nav_link" title="Trabajadores">
                        <i class='bx bx-shopping-bag nav_icon'></i>
                        <span class="nav_name">Trabajadores</span>
                    </a> 
                    <a href="<?php echo base_url("departamentos")?>" title="Departamentos" class="nav_link">
                        <i class='bx bx-buildings nav_icon'></i>
                        <span class="nav_name">Departamentos</span>
                    </a>
                    <a href="<?php echo base_url("adminUsuarios")?>" class="nav_link" title="Usuarios"> 
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Usuarios</span>
                    </a>
					<a href="<?php echo base_url("cambiarPass")?>" class="nav_link" title="Cambiar contraseña">
                        <i class='bx bx-lock-alt nav_icon'></i>
						<span class="nav_name">Cambiar contraseña</span>
                    </a> 
                </div>
                    <?php
                }else if($_SESSION["tipo"] == 0){
                    ?>
                    <div class="nav_list">
                    <a href="<?php echo base_url("userDocumentos") ?>" class="nav_link" title="Documentos">
                        <i class="fas fa-file-alt"></i>
                        <span class="nav_name">Documentos</span>
                    </a>
					<a href="<?php echo base_url("cambiarPass")?>" class="nav_link" title="Cambiar contraseña">
                        <i class='bx bx-lock-alt nav_icon'></i>
						<span class="nav_name">Cambiar contraseña</span>
                    </a> 
                </div>
                    <?php
                }else if ($_SESSION["tipo"] == 2){
                    
                }
                 ?>
				
                <!--Admin -->
			</div>
			<a href="<?php echo base_url("logout") ?>" class="nav_link" title="Cerrar sesión"> <i class='bx bx-log-out nav_icon'></i> <span
					class="nav_name">Salir</span> </a>
		</nav>
	</div>