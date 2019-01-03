<?php
session_start();

header('Content-type: text/html;charset = utf-8');

echo'
	<link href="../css/estilo2.css" rel="stylesheet" type="text/css"/>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../js/jquery.min.js">

	<html>
	<body id="LoginForm">
	<div class="container">
	<div class="login-form">
	<div class="main-div">
	<div class="panel">
		<label class = "titulo"><strong>ACESSO</strong></label><p/>
	</div>

	<div id = "faixa"></div>
	<div id = "login">

		<form id="Login" method = "POST" action = "">
			
			<div class="form-group">
				<input class = "matricula" type = "text" name = "matricula" placeholder="Matricula"/> </p>
			</div>
			
			<div class="form-group">
				<input class = "senha" type = "password" name = "senha" placeholder="Senha"/></p>
			</div>

			<input class = "btn btn-primary" type = "submit" value = "Logar"/>
			<input class = "btn btn-primary" type = "reset" value = "Limpar"/>
			<div id = "faixa"></div>
			
		</form>
			</div>
			</div>
			</div>
			</body>
			</html>
';
		
if (empty($_POST)) {
		echo'';
	}else{
		$matricula = $_POST['matricula'];
		$senha = $_POST['senha'];
		include('conexao.php');
		$sql=mysqli_query($conexao,"SELECT * FROM usuarios WHERE matricula='$matricula' and senha='$senha'");
		$x=mysqli_num_rows($sql);

			if ($x > 0) {
				session_start();
				$_SESSION['login']=$matricula;
				$_SESSION['senha']=$senha;

				while($linha = mysqli_fetch_assoc($sql)) {
					$_SESSION['nome']= $linha['nome'];
					header('Location: admin.php');
				}
				
			}else{
				echo '<div id = "msg">Login e Senha Iválidos! </br> Tente novamente!</div>';
			}
	}
	echo'

';
?>