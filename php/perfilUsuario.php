<?php
    session_start();
    require_once "conexao.php";
    require_once "seguranca.php";

    acesso_seguro();
?>

<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>INSTAFOOD</title>
        <meta charset="utf-8">
        <link rel="icon" 
        type="image/jpg" 
        href="../imagens/logo.png" />
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/feedNoticias.css">
        <style>
        .topo-logo{
            width: 20%;
        }

        .foto-capa{
            border: 1px solid black;
            border-radius: 10px;
            height: 200px;
            margin: 5px 5px 0 5px;
            text-align: center;
        }
        .foto-perfil{
            position: absolute;
            top: 25%;
            right: 42%;
            border-radius: 10px;
            background-color: #dddddd;
            background-image: url(../imagens/icons/user.png);
            background-size: 180px 180px; 
            height: 180px;
            width: 180px;
            text-align: center;
            font-family: constantia;
            font-size: 17pt;
            font-weight: bold;

        }
        .center{
            text-align: left;
        }
        .centerFeed{
            margin: 10% 0px;
            top: 10%;
        }
        #fotoUsuarioPost{
            left: 30%;
        }
        
        </style>
    </head>
    <body>
        <div class="folha background-folha">
            <div class="topo">
                <ul>
                    <li class="topo-logo">
                        <a href="feedNoticias.php"><img src="../imagens/logo-nome.png" alt="logotipo BRASSFOOD somente texto - USF 2017" title="brassfood-textlogo"></a>
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
    <div class="center">
        <div class="foto-capa">
            <img id="capa" src="" alt="">
        </div>
        <div class="foto-perfil">
            <?php
            $conn = getConnection();
            $userLogado = $_SESSION['IDLogado'];
            $select = $conn->query("SELECT Nome, Sobrenome, senha, urlFotoPerfil FROM Usuarios WHERE idUser = '".$userLogado."'");
            $result = $select->fetch();
            echo "<img src=\"../fotoUsuarios/".$result['urlFotoPerfil'] ."\" style='border-radius: 10px;' width=180px height=180px>"."<br/>";
            echo $result['Nome']." ".$result['Sobrenome']."<br>";
            ?>
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
                    <input id="postagem" name="postagem" type="text" placeholder="Como você quer chamar essa receita?" >                    
                    <label class="fileImagem" for="filebutton">Imagem</label>
                    <input id="filebutton" name="filebutton" class="input-file" type="file"/><br/><br/>
                    <button id="cadastrar" name="Cadastrar" type="submit">Publicar</button>
                </fieldset>
            </form>
        </div>
    <script type="text/javascript" src="../js/displayFeed.js"></script>
            
            <?php
            
            $db = getConnection();
            foreach($db->QUERY('SELECT u.Nome, u.Sobrenome, DataPost, Legenda, UrlObjeto, urlFotoPerfil FROM Post as p INNER JOIN Usuarios as u on u.IDUser = p.IDUser order by DataPost desc') as $row)
            {
            ?>
                <fildset id="exibicao">
                <div id="fotoUsuarioPost"><?php echo "<img class='fotoPost' src=\"../fotoUsuarios/".$row['urlFotoPerfil'] ."\" width=70px height=70px;>"; ?></div>
                <div id="nomeUsuarioPost"><?php echo $row['Nome']." ".$row['Sobrenome'];?></div> </br>
                <div id="dataPost"><?php echo $row['DataPost'];?></div>
                <div id="legendaPost"><?php echo $row['Legenda'];?></div>
                <?php echo "<img class='fotoPost' src=\"../fotos/".$row['UrlObjeto'] ."\" heigth=auto width=700px>";?>        
                <br/>
                <br/>
                </fildset>
                <?php
            }
            ?>
    </div>
    </div>                   
    </body>
    
</html>