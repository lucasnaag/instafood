<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <title>INSTAFOOD</title>
    <meta charset="UTF-8">
    <link rel="icon" 
        type="image/jpg" 
        href="../imagens/logo.png" />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/telaInicial.css">
    <style>
        
    </style>
</head>
<body>
    <div class="folha background-folha">
        <div class="topo">
            <ul>
                <li class="topo-logo">
                    <a href="index.php"><img src="imagens/logo-nome.png" alt="logotipo BRASSFOOD somente texto - USF 2017" title="brassfood-textlogo"></a>
                </li>
                <li id="topo-login">
                    <form action="php/login.php" method="post" id="login-form">
                        <label for="user">Usuário:</label><input type="text" name="usuario" id="user" placeholder="Usuário" required="required">
                        <label for="pass">Senha:</label><input type="password" name="senha" id="pass" placeholder="Senha" required="required">
                        <input type="submit" value="Entrar">
                        <script type="text/javascript">

                        </script>
                    </form>
                    <label for="login-form"><a id="redef-senha" href="php/recuperarSenha.php">Esqueci minha senha.</a></label>
                </li>
                <li id="topo-register">
                    <a href="php/fichaCadastro.php" class="linkbotao">Registrar</a>
                </li>
            </ul>
        </div>
        <div class="cadastro">
            <?php
                if(isset($_SESSION['Mensagem']))
                {
                    echo "<div id=\"alert_message\">";
                    echo "<p>".$_SESSION['Mensagem']."</p><br>";
                    echo "<input id=\"ok_buton\" type=\"button\" value=\"OK\" onClick=\"remove_mensagem()\">";
                    echo "</div>";
                    unset($_SESSION['Mensagem']);
                }
            ?>
            
        </div>

        <div class="center">
            <div class="logo image">
		<img src="imagens/logo.png" alt="logotipo BRASSFOOD - USF 2017" title="brassfood-logo">
		<h1> Instafood alteração de titulo</h1>
            </div> 
            <div class="menu-rotativo">
                <div class="image">
                <figure class="borda">
                    <img src="imagens/slideshow-01.jpg" alt="imagem 1 do slideshow da página principal" title="imagem-01" class="listImage">
                    <img src="imagens/slideshow-02.jpg" alt="imagem 2 do slideshow da página principal" title="imagem-02" class="listImage">
                    <img src="imagens/slideshow-03.jpg" alt="imagem 3 do slideshow da página principal" title="imagem-03" class="listImage">
                    <img src="imagens/slideshow-04.jpg" alt="imagem 4 do slideshow da página principal" title="imagem-04" class="listImage">
                    <img src="imagens/slideshow-05.jpg" alt="imagem 5 do slideshow da página principal" title="imagem-05" class="listImage">
                    <img src="imagens/slideshow-06.jpg" alt="imagem 6 do slideshow da página principal" title="imagem-05" class="listImage">
                    <img src="imagens/slideshow-07.jpg" alt="imagem 7 do slideshow da página principal" title="imagem-05" class="listImage">
                </figure>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/carrouselTInicial.js"></script>
<script type="text/javascript" src="js/mensagem_login.js"></script>

</html>
