<?php
require_once "seguranca.php";
require_once "conexao.php";

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$idUser = $_SESSION['IDLogado'];
$fotoPerfil = $_FILES["filebutton"];
$urlFotoPerfil = uniqid();
$conn = getConnection();
$mens = 0;
if(!empty($nome))
{
    $stmt = $conn->prepare("UPDATE Usuarios SET Nome=:nome WHERE IDUser=:idUser");
    $stmt->bindParam(":nome",$nome);
    $stmt->bindParam(":idUser",$idUser);
    $retorno = $stmt->execute();
    $mens = 1;
}
if(!empty($sobrenome))
{
    $stmt = $conn->prepare("UPDATE Usuarios SET Sobrenome=:sobrenome WHERE IDUser=:idUser");
    $stmt->bindParam(":sobrenome",$sobrenome);
    $stmt->bindParam(":idUser",$idUser);
    $retorno = $stmt->execute();
    $mens = 1;
}
if (!empty($fotoPerfil["name"])) 
{	
    $largura = 1500;
    $altura = 1800;
    $tamanho = 100000000;
    $error = array();
    // Verifica se o arquivo é uma imagem
    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $fotoPerfil["type"]))
    {
            $error[1] = "Isso não é uma imagem.";
        } 
// Pega as dimensões da imagem
$dimensoes = getimagesize($fotoPerfil["tmp_name"]);
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
if($fotoPerfil["size"] > $tamanho) 
{
        $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
}
if (!empty($erro)) {
    $_SESSION['Mensagem'] = $erro;
    header("Location: ../confguracao.php");
   } else {
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $fotoPerfil["name"], $ext);
    $nome_imagem = $urlFotoPerfil . "." . $ext[1];
    $caminho_imagem = "../fotoUsuarios/" . $nome_imagem;
    move_uploaded_file($fotoPerfil["tmp_name"], $caminho_imagem);
    $stmt = $conn->prepare("UPDATE Usuarios SET urlFotoPerfil=:urlFotoPerfil WHERE IDUser=:idUser");
    $stmt->bindParam(":urlFotoPerfil",$nome_imagem);
    $stmt->bindParam(":idUser",$idUser);
    $stmt->execute();
    $mens = 1;
}
}
if($mens = 1)
{
    $_SESSION['Mensagem'] = "Alteração efetuada com sucesso!";
}

header("Location: configuracao.php");
?>