<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import de jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Imports de boostrap e iconos-->
    <link rel="stylesheet" href="../Estilos/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" href="../Estilos/bootstrap/css/inicio.css">
    <script defer src="../Estilos/icons/js/all.js"></script>

	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>

  <?php 
    /*Comprobar si el usuario esta logeado*/
        require_once '../Resources/PHP/funciones.php';
        session_start();
        if(isset($_SESSION['logueado'])){

        }else{
          header("Location: login.php");
        }

        if(isset($_POST['nuevoItemCesta'])){
          $idArticulo = $_POST['idArticulo'];
          $_SESSION['cesta'][] = devuelveArticulo($idArticulo);
        }

  ?>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" 
          aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="inicio.php"><img src='../Resources/img/logo.png' alt='logo' style='width:50px;height:50px;'></a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item active">
          <a class="nav-link" href="nuevoDisco.php">Añadir articulo</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#"> AdministracionUsuarios</a>
        </li> -->
        <li class="nav-item active">
        <a class="nav-link" href="perfil.php">Perfil</a>
        </li>
        <?php 

            if (isset($_SESSION['logueado'])) {

              //A la hora de comprobar el tipo no coge nada si es admin
                if ($_SESSION['logueado']['admin']) {
                  echo "<li class='nav-item active'>
                      <a class='nav-link' href='nuevoDisco.php'>Añadir articulo</a>
                    </li>";

                  echo "<li class='nav-item active'>
                      <a class='nav-link' href='administrador.php'>Administracion</a>
                    </li>";
                }

            }
?>
      </ul>

          <a class="nav-link active" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
          <a class="nav-link active" href="carrito.php"><i class="fas fa-shopping-cart fa-lg" ></i></a>
    
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>
  </nav>

</body>
</html>