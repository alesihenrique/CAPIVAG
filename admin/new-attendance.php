<?php
    require_once('header.php');
    if (isset($_POST['nomepaciente_atend'])) {
    	require_once('../config/Conexao.php');
    	$pdo = (ConnectionFactory::getConnection());

		$stm = $pdo->prepare("INSERT INTO atendimentos
								(nomepaciente_atend,
								nomemedico_atend,
								dtconsulta_atend) VALUES
								(:nomepaciente,
								:nomemedico,
								:dataconsulta)");
		$stm->bindValue(':nomepaciente', $_POST['nomepaciente_atend']);
		$stm->bindValue(':nomemedico', $_POST['nomemedico_atend']);
		$stm->bindValue(':dataconsulta', $_POST['dtconsulta_atend']);
		$insert = $stm->execute();
		if ($insert) {
			echo '<script>alert("Cadastrado com sucesso!");</script>';	
			echo '<script>window.location.href="atendimentos.php"</script>';
		} 
    }
?>
<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    <div class="content">

    <form action="new-attendance.php" method="POST">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nome do paciente</label>
                    <input type="text" name="nomepaciente_atend" class="form-control" placeholder="Informe o nome do paciente" required="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Médico responsável</label>
                    <select class="form-control" name="nomemedico_atend" required="">
                    	<option value="">Selecione</option>
                    	<option value="Dr. Carlos Andreazza">Dr. Carlos Andreazza</option>
                    	<option value="Dr. Carlos Andreazza">Dr. Carlos Andreazza</option>
                    	<option value="Dr. Carlos Andreazza">Dr. Carlos Andreazza</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Data da consulta</label>
                    <input type="date" name="dtconsulta_atend" class="form-control" required="">
                </div>
            </div>            
        </div>        

        <button type="submit" class="btn btn-info btn-fill pull-right">Cadastrar Atendimento</button>
        <div class="clearfix"></div>
    </form>
</div>
<?php
    require_once('footer.php');
?>
        
