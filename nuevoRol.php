<?php

    include './service/rolService.php';
    
    $accion="Agregar";
    $rol="";
    $codRol="";
    $result="";
    $titulo = "Gestión Funcionalidad";

    $rolService = new RolService();

    $rol = $rolService->findRoles();
    
    
    if(isset($_POST["accion"]) && $_POST["accion"] == "Agregar"){
        $titulo = "Nuevo Modulo Rol";
        $accion = "Aceptar";
    }elseif(isset($_POST["codRol"])){
        $result = $rolService->findByRol($_POST["codRol"]);
        $codRol=$_POST["codRol"];
        
    }
    
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestión de roles</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- BORRE EL SEARCH AQUI  -->
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <p class="brand-link">
                <span class="brand-text font-weight-light" style="color:white;">Examen Desarrollo WEB </span>
            </p>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./dist/img/carnet.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <p class="d-block" style="color:white;">Santiago Vivas</p>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="./modulo.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Modulo</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="./funcionalidad.php" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Funcionalidad</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Rol</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid" style="text-align: center;">
                    <div class="row mb-1">
                        <div class="col-sm-10">
                            <h1><?php echo $titulo; ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container-fluid">
                <div class="container">
                    <form METHOD="POST" action="rol.php" id="form" name="form">

                        <div class="row">
                            <div class="col-sm-1">
                                <h4>Rol</h4>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="col">
                                        <select class="form-control" id="codRol" name="codRol" form="form">

                                            <?php  if ($rol->num_rows > 0) { while($row1 = $rol->fetch_assoc()) { ?>
                                            <option
                                                <?php if($codRol!="" && $codRol == $row1["COD_ROL"] ){echo "selected";}  ?>
                                                value=<?php echo $row1["COD_ROL"]?>>
                                                <?php echo $row1["NOMBRE"]?>
                                            </option>
                                            <?php }
                                                 }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-1">
                                <input type="button" name="aceptar" class="btn btn-block btn-primary float-right"
                                    style="padding-bottom: 4px; width:75px;" value="aceptar" onclick="aceptarRol();">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                                <div class="card">
                                    <div class="card-body table-responsive p-1" style="height: 200px;">
                                        <?php if(isset($_POST["accion"]) && $_POST["accion"] == "Agregar"){ ?>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h5>Modulo</h5>
                                            </div>
                                            <div class="col-sm-3">
                                            <select class="form-control" id="codRol" name="codRol" form="form">

                                                <?php  if ($rol->num_rows > 0) { while($row1 = $rol->fetch_assoc()) { ?>
                                                <option
                                                    <?php if($codRol!="" && $codRol == $row1["COD_ROL"] ){echo "selected";}  ?>
                                                    value=<?php echo $row1["COD_ROL"]?>>
                                                    <?php echo $row1["NOMBRE"]?>
                                                </option>
                                                <?php }
                                                 }
                                                    ?>
                                            </select>
                                            
                                            </div>
                                            
                                        </div>
                                            <?php }else{ ?>

                                            <table class="table table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>MODULOS</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                        if($result!=""){
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                        ?>
                                                    <tr>
                                                        <td><?php echo $row["NOMBRE"]?></td>
                                                        <td><input type="radio" name="eliCodigo"
                                                                value="<?php echo $row["COD_MODULO"]?>"></td>
                                                    </tr>
                                                    <?php 
                                        }
                                        ?>

                                                    <?php 
                                        }else{
                                        ?>
                                                    <tr>
                                                        <td colspan="4"> No hay datos</td>
                                                    </tr>
                                                    <?php }}
                                        ?>
                                                </tbody>
                                            </table>

                                            <?php } ?>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <input type="submit" class="btn btn-primary btn-block" name="accion"
                                                        value="<?php echo $accion;?>">
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="button" name="aceptar"
                                                        class="btn btn-block btn-primary float-right"
                                                        style="padding-bottom: 4px; width:75px;" value="Eliminar"
                                                        onclick="eliminarRol();">

                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>


                            </div>
                    </form>
                </div>
            </div>


        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    <!-- jQuery -->
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="./plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./dist/js/demo.js"></script>

    <!-- Page specific script -->
    <?php

    ?>
    <script>
    function eliminarRol() {
        document.getElementById("form").submit();
    }

    function aceptarRol() {
        document.getElementById("form").submit();
    }
    </script>
</body>

</html>