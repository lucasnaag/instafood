<?php
require_once "conexao.php";
require_once "seguranca.php";
$email = $_POST['email'];
$senha = $_POST['senha'];
$idUser = $_SESSION['IDLogado'];
$conn = getConnection();
$mensagem = 0;
if(!empty($email))
{
    $stmt = $conn->prepare("UPDATE Usuarios SET email=:email WHERE IDUser=:idUser");
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":idUser",$idUser);
    $stmt->execute();
    $mensagem = 1;
}
echo $senha;
if(!empty($senha))
{
    $stmt = $conn->prepare("UPDATE Usuarios SET Senha=:senha WHERE IDUser=:idUser");
    $stmt->bindParam(":senha",$senha);
    $stmt->bindParam(":idUser",$idUser);
    $stmt->execute();
    $mensagem = 1;
}
if($mensagem = 1)
{
    $_SESSION['Mensagem'] = "Alteração efetuada com sucesso!";
}
header("Location: configuracao.php");
?>