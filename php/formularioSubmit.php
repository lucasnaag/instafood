<?php
require_once "conexao.php";
session_start();

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
echo $sexo;
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['password'];

// Cria uma variável que terá os dados do erro
$erro = false;
 
// Verifica se o POST tem algum valor
if ( !isset( $_POST ) || empty( $_POST ) ) {
 $erro = 'Nada foi postado.';
} 
// Cria as variáveis dinamicamente
foreach ( $_POST as $chave => $valor ) {
 // Remove todas as tags HTML
 // Remove os espaços em branco do valor
 $$chave = trim( strip_tags( $valor ) );
 
 // Verifica se tem algum valor nulo
 if ( empty ( $valor ) ) {
 $erro = 'Existem campos em branco.';
 }
}
if ( ( ! isset( $nome ) || ! is_string( $nome ) || strlen($nome) > 100  ) && !$erro ) {
    $erro = 'Preencha o nome corretamente';
}
if ( ( ! isset( $sobrenome ) || ! is_string( $sobrenome ) || strlen($sobrenome) > 200  ) && !$erro ) {
    $erro = 'Preencha o sobrenome corretamente';
}    
// Verifica se $idade realmente existe e se é um número. 
// Também verifica se não existe nenhum erro anterior
if ( ( ! isset( $nascimento ) ) && !$erro ) {
 $erro = 'Preencha a data de nascimento corretamente';
}
$masculino = 'masculino';
$feminino = 'feminino';
$outro = 'outro';

if ( ( ! isset( $telefone ) || ! is_numeric($telefone) || strlen($telefone) > 18  ) && !$erro ) {
   $erro = 'Preencha o telefone corretamente';
}

// verifica usuario no banco
$pdo = getConnection(); 
$sql = "SELECT * FROM usuarios WHERE Email = '".$email."' LIMIT 1";
$retorno = $pdo->query($sql);
$retorno = $retorno->fetch();

// Verifica se $email realmente existe e se é um email. 
// Também verifica se não existe nenhum erro anterior
if ( ( ! isset( $email ) || ! filter_var( $email, FILTER_VALIDATE_EMAIL ) || strlen($email) > 150 ) && !$erro ) {
 $erro = 'Envie um email válido';
}else if($retorno){
    $erro = 'Email já cadastrado';
}
// reset var db
unset($pdo, $sql, $stmt, $retorno);

if (!empty($erro)) {
    $_SESSION['Mensagem'] = $erro;
    header("Location: ../index.php");
   } else {
        $pdo = getConnection();
        $urlFotoPerfil = uniqid();
        $fotoPerfil = $_FILES["filebutton"];
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $fotoPerfil["name"], $ext);
        $url = $urlFotoPerfil . "." . $ext[1];
        echo $url;
        $sql = "INSERT INTO Usuarios (nome,sobrenome,DataNascimento,sexo,telefone,email,Senha,UrlFotoPerfil)
        VALUES(:nome,:sobrenome,:nascimento,:sexo,:telefone,:email,:senha,:urlFotoPerfil)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nome",$nome);
        $stmt->bindParam(":sobrenome",$sobrenome);
        $stmt->bindParam(":nascimento",$nascimento);
        $stmt->bindParam(":sexo",$sexo);
        $stmt->bindParam(":telefone",$telefone);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":senha",$senha);
        $stmt->bindParam(":urlFotoPerfil",$url);
        $retorno = $stmt->execute();
        if (!empty($fotoPerfil["name"])) 
        {	
            // Largura máxima em pixels
            $largura = 1500;
            // Altura máxima em pixels
            $altura = 1800;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 100000000;
            $error = array();
            // Verifica se o arquivo é uma imagem
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $fotoPerfil["type"]))
            {
                    $error[1] = "Isso não é uma imagem.";
                } 
        // Pega as dimensões da imagem
            if (count($error) == 0) 
            {
                $caminhoImagem = "../fotoUsuarios/" . $url;
                move_uploaded_file($fotoPerfil["tmp_name"], $caminhoImagem);
            }
        }
        $_SESSION['Mensagem'] = "Cadastro efetuado com sucesso!";
        header("Location: ../index.php");
   }
?>  