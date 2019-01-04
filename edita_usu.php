<!DOCTYPE html>

<?php
	session_start();
	if(empty($_SESSION['login'])){
		header('Location: login.php');
	}

	$cod = $_GET['cod'];
	include('conexao.php');
	$exibir = "SELECT * FROM usuarios WHERE id_usu = '$cod'";
	$mostrar = mysqli_query($conexao,$exibir) or die ("Falhou");
	while ($linha = mysqli_fetch_array($mostrar)) {
		$id = $linha['id_usu'];
		$nome = $linha['nome'];
		$senha = $linha['senha'];
		$tipo = $linha['status'];
		
	}
	
?>
<html lang="pt-br">
<!-- principal.php na pasta adm  -->
<head>
<meta charset="utf-8">
	<head charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/modelo2.css" />
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../js/jquery.min.js">
</head>

<body>

<div id="topo"> 
	<div id="indica"> 
		<div id="indicad"><strong> Usuario:</strong> <?php echo($_SESSION['nome']);?> 
			<a href="sair.php"> Sair</a>
		</div>
	</div>
</div>
<div id="faixa"> </div>
<div id="tudo">
	<div id="tudod">
		<p class="titulo"> Editar dados de Usuários </p>
		<form method = "GET" action = "editar_cad.php">
			<input type = "hidden" name = "id" value = "<?php echo $id; ?>"><p/>
			<label> Nome: </label>
			<input type = "text" name = "nome" value = "<?php echo $nome;?>"/></p>

			<label> Senha: </label>
			<input type = "password" name = "senha" value = "<?php echo $senha;?>"/></p>

				<label>Status: </label>
				<select name = "status">
				<option value = "ss"> Selecione... </option>
				<option value = "PADRAO"> ATIVO </option>
				<option value = "ADM"> INATIVO </option>
				</select></p>

			<input type = "submit" value = "cadastrar"/>
			<input type = "reset" value = "limpar"/>

		</form>

	</div>
	<div id="tudoe">
		
		<div class="row">
		  <div class="col-8">
		    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="admin.php" role="tab" aria-controls="v-pills-settings" aria-selected="false">Administrador</a>
		      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="cadastro_usu.php" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cadastro</a>
		      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="visualiza_usu.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Usuarios</a>		      
		    </div>
		  </div>

		</div>

	</div>
</div>

</body>
</html>