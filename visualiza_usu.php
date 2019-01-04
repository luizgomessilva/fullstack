<!DOCTYPE html>
<?php 
	session_start();
	if(empty($_SESSION['login'])){
		header('Location: login.php');
	}
?>
<html lang="pt-br">
<!-- principal.php na pasta adm  -->
<head charset="utf-8">
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
		<p class="titulo"> Visualizar Usuarios </p>
		
			<?php

			include('conexao.php');
			$exibir = "SELECT * FROM usuarios";
			$mostrar = mysqli_query($conexao,$exibir) or die ("Falha na Busca!");

			?>

			<table class = "visao" border = "1" width = "600">
				<tr>
					<td>Nome</td>
					<td>Matricula</td>
					<td>Status</td>
					<td>Data cadastro</td>
					<td colspan = "2">Operacoes</td>
				</tr>

				<?php
					while ($linha=mysqli_fetch_array($mostrar)) {
						$id = $linha['id_usu'];
						$nome = $linha['nome'];
						$matricula = $linha['matricula'];
						$status = $linha['status'];
						$senha = $linha['senha'];
						$data = $linha['created'];
						$a = explode('-',$data);
						$b = $a[2]."/".$a[1]."/".$a[0];


						
						
						echo("
						<tr>
							<td> $nome </td>
							<td> $matricula </td> 
							<td> $status </td>
							<td> $b </td>
							<td><a href = 'edita_usu.php?cod=$id' class = 'editar'>E</a></td>
							<td><a href = 'deletar.php?cod=$id' class = 'apagar'>X</a></td>
						</tr>
						");
					}

				?>
			</table>

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