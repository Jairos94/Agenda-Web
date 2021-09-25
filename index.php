<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Jairo Rivera">
    <meta name="generator" content="Jekyll v4.1.1">
    <link rel="icon" href="favicon.ico/">

    <title>Agenda de contactos personal</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d05ffc26f7.js" crossorigin="anonymous"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="bootstrap/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<!-- Favicons -->

<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">

<meta name="theme-color" content="#563d7c">


<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
<!-- Custom styles for this template -->
<link href="starter-template.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">impartiendo conocimiento</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Facebook</a>
                        <a class="dropdown-item" href="#">youtube</a>
                        <a class="dropdown-item" href="#">instagram</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">

        <div class="starter-template">
            <h1 class="page-header text-center">Agenda de contactos personal</h1>
            <div class="row">

                <div class="col-sm-12">
                    <a href="#addNew" class="btn btn-primary" data-toggle="modal"><span class="fas fa-plus"></span> Nuevo</a>
                    <?php
                    //session_start();
                    if (isset($_SESSION['message'])) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" style="margin-top: 20px;">
                                &times;
                            </button>
                            <?php echo $_SESSION['message']; ?>
                        </div>

                    <?php
                        unset($_SESSION['message']);
                    }
                    ?>

                    <table class="table table-border table-striped" id="MiAgenda" style="margin-top:20px;">
                        <thead>
                            <th>ID</th>
                            <th>NOMBRE CONTACTO</th>
                            <th>CELULAR</th>
                            <th>CORREO</th>
                            <th>DIREECION</th>
                            <th>ACCIONES</th>
                        </thead>
                        <tbody>
                            <?php
                            include_once('conexion.php');
                            $database = new ConectarBD();
                            $db = $database->open();
                            try {
                                //code...
                                $sql = 'SELECT * FROM personas';
                                foreach ($db->query($sql) as $row) {
                            ?>
                                    <tr>
                                        <td><?php echo $row['idPersona']; ?></td>
                                        <td><?php echo $row['Nombre']; ?></td>
                                        <td><?php echo $row['Telefono']; ?></td>
                                        <td><?php echo $row['Correo']; ?></td>
                                        <td><?php echo $row['Direccion']; ?></td>
                                        <td><a href="#edit_<?php echo $row['idPersona']; ?>" class="btn btn-success btn-sm" data-toggle="modal">
                                                <SPan class="fa fa-edit"></SPan> Editar</a>
                                            <a href="#delete_<?php echo $row['idPersona']; ?>" class="btn btn-danger btn-sm" data-toggle="modal">
                                                <SPan class="fa fa-trash"></SPan> Eliminar</a>
                                        </td>
                                        <?php include('EditarEliminarModal.php'); ?>
                                    </tr>
                            <?php

                                }
                            } catch (PDOException $e) {
                                //throw $th;
                                echo 'Hay un problema con la conexion ' . $e->getmessage();
                            }
                            $database->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div><!-- /.container -->
    <?php include('addModal.php'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="=//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#MiAgenda').DataTable();
        });
    </script>
</body>

</html>