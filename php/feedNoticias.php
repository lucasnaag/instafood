<?php
    session_start();

    require_once "seguranca.php";

    acesso_seguro();
?>

<!-- 
    $_SESSION['UsuarioLogado'] 
    $_SESSION['NomeCompleto']
    $_SESSION['UsuarioLogin']
    $_SESSION['UsuarioSenha']
-->

<!DOCTYPE html>
<html lang=pt-br>
<head>
    <meta charset: "UTF-8"/>
    <title>Feed de Notícias</title>
    <link rel="icon" 
        type="image/jpg" 
        href="../imagens/logo.png" />
<link rel="stylesheet" href="../css/estilos.css"> 
    <link rel="stylesheet" href="../css/feedNoticias.css">
    
    <style>
            
           
    </style>
</head>
<body>
    <div class="folha background-folha">
        <div class="topo">
            <ul>
                <li class="topo-logo">
                    <a href="../php/FeedNoticias.php"><img src="../imagens/logo-nome.png" alt="logotipo BRASSFOOD somente texto - USF 2017" title="brassfood-textlogo"></a>
                </li>
                <li class="topo-pesquisa">
                    <form action="pesquisa.php" method="post" class="pesquisa">
                        <input type="search" name="busca" id="busca" placeholder="Digite o que procura...">
                        <input type="image" height="25px" width="25px" src="../imagens/icons/compass.png" alt="icone de pesquisa">
                    </form>
                </li>
                <li class="topo-icons">
                    <a href="perfilUsuario.php"><img height="25px" width="25px" src="../imagens/icons/avatar.png" alt="icone perfil de usuario"></a>
                    <a href="configuracao.php"><img height="25px" width="25px" src="../imagens/icons/settings-1.png" alt="icone de configuração de conta"></a>
                    <a href="desconectarConta.php"><img height="25px" width="25px" src="../imagens/icons/logout.png" alt="icone de logout/exit session"></a>
                </li>          
            </ul>
        </div>
    <div class="centerFeed">         
            <div class="abrirReceita">
                O que está pensando em comer hoje?
                <a  href="#" onClick="novoPost(this);" id ="mostraReceita">
                <input type="button" value="Conte para nós" ></a>
            </div>
            <br/>
        <div id="novaReceita">
            <form action="processamentofeed.php" method="post" enctype="multipart/form-data">
                <fieldset class="receita">
                    <!--<input id="postagem" name="postagem" type="text" placeholder="Como você quer chamar essa receita?" >                    -->
                    <textarea class="postagem" name="postagem" rows="5" cols="98" placeholder="Como você quer chamar essa receita?"></textarea>
                    <label class="fileImagem" for="filebutton">Imagem</label>
                    <input id="filebutton" name="filebutton" class="input-file" type="file"/><br/><br/>
                    <button id="cadastrar" name="Cadastrar" type="submit">Publicar</button>
                </fieldset>
            </form>
        </div>
    
            
            <?php
            require_once "conexao.php";
            $db = getConnection();
            //foreach($db->QUERY('SELECT u.Nome, u.Sobrenome, u.IDUser, p.DataPost, p.Legenda, p.UrlObjeto FROM Post as p INNER JOIN Usuarios as u on p.IDUser = u.IDUser INNER JOIN Perfil as pf ON pf.IDUser = p.IDUser order by DataPost desc') as $row)
            foreach($db->QUERY('SELECT u.Nome, u.Sobrenome, DataPost, Legenda, UrlObjeto, urlFotoPerfil FROM Post as p INNER JOIN Usuarios as u on u.IDUser = p.IDUser order by DataPost desc') as $row)
            {
            ?>
                <fildset id="exibicao">
                <div class="nada">
                <div id="fotoUsuarioPost"><?php echo "<img class='fotoPost' src=\"../fotoUsuarios/".$row['urlFotoPerfil'] ."\" width=70px height=70px;>"; ?></div>
                <div id="nomeUsuarioPost"><?php echo $row['Nome']." ".$row['Sobrenome'];?></div> </br>
                <div id="dataPost"><?php echo $row['DataPost'];?></div>
                <div id="legendaPost"><?php echo $row['Legenda'];?></div>
                <?php echo "<img class='fotoPost' src=\"../fotos/".$row['UrlObjeto'] ."\" heigth=auto width=700px>";?>        
                </div>
                <br/>
                <br/>
                </fildset>
                <?php
            }
            ?>
    </div>          
    <script type="text/javascript" src="../js/displayFeed.js"></script>
    
</body>
</html>