<?php
    include './service/moduloService.php';
    
    $accion="Agregar";
    $nombreModulo = "";
    $estadoModulo = "";
    $fechaPublicacion = "";
    $codigoModulo = "";

    $moduloService = new ModuloService();

    if(isset($_POST["accion"]) && $_POST["accion"] == "Agregar"){
        $moduloService->insert($_POST["codigo"],$_POST["nombre"],$_POST["estado"]);
        $accion="Agregar";
    
    }elseif(isset($_POST["accion"]) && $_POST["accion"] == "Modificar"){
        $moduloService->update($_POST["codigo"],$_POST["nombre"],$_POST["estado"]);    
        $accion="Agregar";
    
    }elseif(isset($_POST["eliCodigo"])){
        $moduloService->delete($_POST["eliCodigo"]);
    
    }elseif(isset($_GET["update"])){
        
        $modulo = $moduloService->findByPk($_GET["update"]);

        if ($modulo!=null) {
                $codigoModulo=$modulo["COD_MODULO"];
                $nombreModulo = $modulo["NOMBRE"];
                $estadoModulo = $modulo["ESTADO"];
            }
        $accion="Modificar";
    }

    $result = $moduloService->findAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modulo</title>
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
                            <a href="" class="nav-link active">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Modulo</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="./funcionalidad.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Funcionalidad</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="./rol.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>rol</p>
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
                            <h1>Gestión Modulos</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="container-fluid">
                <div class="container">
                    <form METHOD="POST" action="./modulo.php" id="form" name="form">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Listado de Modulos</h3>
                                    </div>
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Código Modulo</th>
                                                    <th>Nombre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td><a href="./modulo.php?update=<?php echo $row["COD_MODULO"]?>">
                                                            <?php echo $row["COD_MODULO"]?> </a></td>
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
                                                <?php }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group card-header">
                                        <input type="button" name="eliminar"
                                            class="btn btn-block btn-primary float-right"
                                            style="padding-bottom: 4px; width:75px;" value="Eliminar"
                                            onclick="eliminarModulo();">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Modulo</h3>
                                    </div>


                                    <div class="card-body">
                                         <div class="form-group">
                                            <label for="codigo">Codigo</label>
                                            <input type="text" class="form-control" id="codigo" name="codigo"
                                                value="<?php echo $codigoModulo?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                value="<?php echo $nombreModulo?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Estado</label >
                                            <select class="form-control" id="estado" name="estado" >
                                                <option value="ACT">ACTIVO</option>
                                                <option value="INA">INACTIVO</option>
                                            </select>
                                        </div>

                                    </div>

                                    <input type="submit" class="btn btn-primary btn-block" name="accion"
                                        value="<?php echo $accion;?>">

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
    function eliminarModulo() {
        document.getElementById("form").submit();
    }
    </script>
</body>

</html>