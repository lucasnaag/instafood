<?php
require_once "conexao.php";
require_once "seguranca.php";

$db = getConnection();
$conn = getConnection();
$idUser = $_SESSION['IDLogado'];
$postagem = $_POST['postagem'];

$foto = $_FILES["filebutton"];

if (isset($_POST['postagem'])){
	$data = date('Y-m-d H:i:s');
	
		$var = ("INSERT INTO Post (IDUser, Legenda) VALUES (:idUser, :postagem)");
		$stmt = $db->prepare($var);
		$stmt->bindParam(":postagem",$postagem);
		$stmt->bindParam(":idUser",$idUser);
		$retorno = $stmt->execute();
		$affected_rows = $stmt->rowCount();
		$id_post = $db->lastInsertId();
		preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
		$url = $id_post . "." . $ext[1];
		echo $url.'<br/>';
		$update = ("UPDATE Post SET UrlObjeto=:url WHERE IDPost=:idPost ");
		$statement = $db->prepare($update);
		$statement->bindParam(":url",$url);
		$statement->bindParam(":idPost",$id_post);
		try {

			$statement->execute();
			echo "tabela atualizada";
		 } catch(PDOException $e) {
			echo $e->getMessage();
		 }
		
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) 
		{	
			// Largura máxima em pixels
			$largura = 1500;
			// Altura máxima em pixels
			$altura = 1800;
			// Tamanho máximo do arquivo em bytes
			$tamanho = 100000000;
			$error = array();
			// Verifica se o arquivo é uma imagem
			if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"]))
			{
     	   		$error[1] = "Isso não é uma imagem.";
   	 		} 
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) 
		{
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) 
		{
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) 
		{
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
		// Se não houver nenhum erro
		if (count($error) == 0) 
		{
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
			
        	// Gera um nome único para a imagem
        	//$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
			$nome_imagem = $id_post . "." . $ext[1];
	
        	// Caminho de onde ficará a imagem
			$caminho_imagem = "../fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
	
			// Se os dados forem inseridos com sucesso
			/*if($stmt)
			{
				echo "Você foi cadastrado com sucesso.";
			}*/
		}
	
		// Se houver mensagens de erro, exibe-as
		/*if (count($error) != 0) 
		{
			foreach ($error as $erro) 
			{
				echo $erro . "<br />";
			}
		}*/
	}
}

	header("Location: feedNoticias.php");
?>