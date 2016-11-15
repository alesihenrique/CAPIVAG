<?php
if (isset($_POST['usuario'])){
  require_once('../config/Conexao.php');  
  $pdo = (ConnectionFactory::getConnection());

  $stm = $pdo->prepare("SELECT * FROM usuarios WHERE login_usu = :login AND senha_usu = :senha");
  $stm->bindValue(':login', $_POST['usuario']);
  $stm->bindValue(':senha', $_POST['senha']);
  $stm->execute();
  $usuario = $stm->fetch();
  $stm->closeCursor();
  if ($usuario['id_usu']) {
    @session_start();
    $_SESSION['id_usu'] = ($usuario['id_usu']);
    $_SESSION['login_usu'] = ($usuario['login_usu']);
    header('location:dashboard.php');
  } else {
    echo '<script>alert("Login ou senha incorretos, verifique os dados e tente novamente...");</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/examples/signin/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="http://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form action="login.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Realize o login</h2>
        <label for="inputEmail" class="sr-only">Usuário</label>
        <input name="usuario" type="User" id="inputUser" class="form-control" placeholder="Usuário" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputSenha" class="form-control" placeholder="Senha" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
