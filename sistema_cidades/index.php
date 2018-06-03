
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style/style.css" />
</head>
<body>

<?php
	require_once 'classes/cidade.php';
?>
		<?php
			$cidade = new cidade();
		?>


		<?php
		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome']; //muda aqui
			$tamanho = $_POST['tamanho']; //muda aqui
			$data_nascimento  = $_POST['data_nascimento']; //muda aqui
			$num_igrejas = $_POST['num_igrejas']; //muda aqui

			$cidade = new cidade($nome, $tamanho, $data_nascimento, $num_igrejas); 

			if($cidade->insert()){ //muda aqui
				echo "Inserido com sucesso!";
			}

		endif;

		?>

		<?php 
		if(isset($_POST['atualizar'])):
			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$tamanho = $_POST['tamanho'];
			$data_nascimento = $_POST['data_nascimento'];
			$num_igrejas = $_POST['num_igrejas'];

			$cidade = new cidade($nome, $tamanho, $data_nascimento, $num_igrejas); 

			if($cidade->update($id)){ //muda aqui
				echo "Atualizado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($cidade->delete($id)){ //muda aqui
				echo "Deletado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $cidade->find($id); //muda aqui
		?>



		<?php } ?>
<h2>Sistema de cidades</h2>
<div class="container">
	<h3>Alterar</h3>
  	<form method = "post" action="">
  	    <div class="row">

      <div class="col-75">
        <input type="number" id="fname" name="id" value="<?php echo $resultado->id; ?>"  placeholder="aqui aparecerá o id" hidden>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Nome da cidade</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Digite o nome da cidade">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Tamanho</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="tamanho" value="<?php echo $resultado->tamanho; ?>" placeholder="Digite o tamanho da cidade (apenas numeros)">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Data_Nascimento</label>
      </div>
      <div class="col-75">
        <input type="date" id="lname" name="data_nascimento" value="<?php echo $resultado->data_nascimento; ?>" placeholder="Digite a data de nascimento da cidade">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Número_igrejas</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="num_igrejas" value="<?php echo $resultado->num_igrejas; ?>" placeholder="Digite a quantidade de igrejas na cidade">
      </div>
    </div>
    <div class="row">
      <input type="submit" name = "atualizar" value="Atualizar">
    </div>
  </form>
</div>
<div class="container">
	<h3>Inserir</h3>
  <form method = "post" action="">
    <div class="row">
      <div class="col-25">
        <label>Nome da cidade</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="nome" placeholder="Digite o nome da cidade">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Tamanho</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="tamanho" placeholder="Digite o tamanho da cidade (apenas numeros)">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Data_Nascimento</label>
      </div>
      <div class="col-75">
        <input type="date" id="lname" name="data_nascimento" placeholder="Digite a data de nascimento da cidade">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label>Número_igrejas</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="num_igrejas" placeholder="Digite a quantidade de igrejas na cidade">
      </div>
    </div>
    <div class="row">
      <input type="submit" name = "cadastrar" value="Inserir">
    </div>
  </form>
</div>





		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th><!--Muda aqui-->
					<th>Tamanho</th>
					<th>Data_Nascimento</th><!--Muda aqui-->
					<th>Num_igrejas</th>
					<th>Acoes</th>
				</tr>
			</thead>
			
			<?php foreach($cidade->findAll() as $key => $value): ?><!--Muda aqui-->

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo $value->tamanho; ?></td>				
					<td><?php echo $value->data_nascimento; ?></td>
					<td><?php echo $value->num_igrejas; ?></td>					
					<td>
						<?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?><!--Muda aqui-->
						<?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?><!--Muda aqui-->
					</td>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

	</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>