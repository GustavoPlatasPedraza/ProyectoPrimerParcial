<?php
if(isset($_SESSION["id"])){
    redirect(base_url("inicio"));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url("resources/css/index.css")?>">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Proyecto</title>
</head>
<body>
    <div class="container">  
            <div class="col-md-12">
                <h1>Login</h1>
            <form action="<?php echo base_url('validarLogin'); ?>" method="post">
                <div class="row">
                    <label for="correo">Correo electronico</label>
                <input clas="form-control" type="email" name="correo" id="correo">
                </div>
                <div class="row">
                    <label for="contra">Contraseña</label>
                <input clas="form-control" type="password" name="contra" id="contra">
                </div><br>
                <div class="row">
                <button class="btn btn-block btn-primary btn-lg" type="submit">Iniciar sesión</button>
                </div>
                </form>
            </div>
    </div>
    <script type="text/javascript">
        var message = "<?php echo $this->session->flashdata('message'); ?>";
    </script>
    <script src="<?php echo base_url("resources/js/index.js") ?>"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>