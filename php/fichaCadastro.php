<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br"> 
<meta charset:"UTF-8"/>
<head>
	<title>Ficha de Cadastro</title>
	<link rel="stylesheet" href="../css/fichaCadastro.css"/>
	
	<link rel="icon" 
        type="image/jpg" 
        href="../imagens/logo.png" />
	<script	type="text/javascript"; src="../js/validacaoFormulario.js"></script>
</head>
<body>

				<div id="topo">
					<figure class="emblema">
						<a href="../index.php"><img  src="../imagens/logo.png"/></a>
					</figure>
				</div>
		
		<form name= "formCadastro" method="post" action="formularioSubmit.php" enctype="multipart/form-data">
		</br> 
		<fieldset id="dados">
			<p><label for="campo-nome">Nome:</label >
					<input type="text" name="nome" id="campo-nome" maxlength='100'/></p>
			<p> <label for="campo-sobrenome"> Sobrenome:</label>
				<input type="text" name="sobrenome" id="campo-sobrenome" size="50" maxlength="200"/></p>
			<p><label for="data-nascimento"> Data de Nascimento </label>
				<input type="date" name="nascimento" id="data-nascimento"></p>
			<p> Sexo:
				<input type="radio" name="sexo" id="campo-masculino" value="masculino"> <label for=campo-masculino>Masculino</label>
				<input type="radio" name="sexo" id="campo-feminino" value="feminino"> <label for=campo-feminino>Feminino</label>
				<input type="radio" name="sexo" id="campo-outro" value="outro"> <label for=campo-outro>Outro</label></p>
			<p><label for="campo-telefone">Telefone:</label>
				<input type="text" name="telefone" id="campo-telefone" maxlength='18'></p>
			<p><label for="campo-email">E-mail:</label>
				<input type="email" name="email" id="campo-email" size="50" maxlength='150'></p>
			<p><label for="campo-senha">Senha:</label>
				<input type="password" name="password" id="campo-senha" maxlength='16'></p>		   	
				<p>Gostaria de adicionar uma foto ao seu perfil?<p>
				<input id="filebutton" name="filebutton" class="input-file" type="file" value="Oi" />

				<p> <input type="checkbox" name="termos" id="campo-termos"/>
					<label for="campo-termos">Concordo com os termos de uso!</label></p>
					<p><input type="submit" name="cadastrar" value = "Cadastrar" onClick="return validar ()" id="botaook"/>
						<input type="reset" name="limpar" value="Limpar"id="botaoclr"/> </p>
						
						
			</fieldset>
	

</form>
</body>
</html>