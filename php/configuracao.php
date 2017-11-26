<?php
    session_start();
    require_once "seguranca.php";
    acesso_seguro();
?>

<!DOCTYPE html>
<html lang="pt-br"> 
<meta charset:"UTF-8"/>
    <head>

        <title>Configurações de Conta</title>
        <link rel="icon" 
        type="image/jpg" 
        href="../imagens/logo.png" />
        <link rel="stylesheet" href="../css/estilos.css"> 
        <style>
        .topo-logo{
            width: 20%;
        }
        
        .foto-capa{
            border: 1px solid black;
            border-radius: 3px;
            height: 200px;
            margin: 5px 5px 0 5px;
            text-align: center;
        }
        .foto-perfil{
            position: absolute;
            top: 25%;
            left: 1%;
            right: 42%;
            border: 1px solid black;
            background-color: #dddddd;
            background-image: url(../imagens/icons/user.png);
            background-size: 180px 180px; 
            height: 180px;
            width: 180px;
            text-align: center;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            font-family: constantia;
        }
        #botaoSalvar{
            font-family: constantia;
            }
        #configUm{
            margin: 0 0px;          
        }
        #configDois{
            margin: 0 0px;
        }
        #configTres{
            margin: 0 0px;       
        }
        #botaoSalvar{
            width:60px;
            height: 30px;
            padding: 2px;
        }
        #botaoVoltar{
            width:60px;
            height: 30px;
            padding: 2px;
        }
        </style>
    </head>
    <body>
            <div class="folha background-folha">
                    <div class="topo">
                        <ul>
                            <li class="topo-logo">
                                <a href="../php/feedNoticias.php"><img src="../imagens/logo-nome.png" alt="logotipo BRASSFOOD somente texto - USF 2017" title="brassfood-textlogo"></a>
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
            echo $result['Nome']." ".$result['Sobrenome'];
            
            ?>
                           
                            <label for="perfil"></label>
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
                        <div class="lateral">
                                <a href="#" onClick="mostrar_abas(this);"id="mostra_aba1" style="text-decoration:none; color:black; font-family:constantia;">Editar Perfil</a>  
                                <a href="#" onClick="mostrar_abas(this);" id="mostra_aba2" style="text-decoration:none; color:black; font-family:constantia;"><p>Configurações de Privacidade</p></a>
                                <a href="#" onClick="mostrar_abas(this);" id="mostra_aba3" style="text-decoration:none; color:black; font-family:constantia;"><p>Configurações de Segurança</p></a>
                        </div>
    <div id="configUm"> 
        <form name= "infoPerfil" method="post" action="alterarPerfil.php" enctype="multipart/form-data">
        <h1>Editar informações do Perfil</h1>
            <br/><p><label for="campo-nome">Nome:</label >
            <input type="text" name="nome" id="campo-nome" maxlength='100'/></p>
            <br/><p> <label for="campo-sobrenome"> Sobrenome:</label>
            <input type="text" name="sobrenome" id="campo-sobrenome" size="50" maxlength="200"/></p>
            <br/>Alterar foto perfil
            <input id="filebutton" name="filebutton" class="input-file" type="file"/>
            <br/><br/>
            <input type="submit" name="salvar" value="Salvar" id="botaoSalvar"/>
            <a href="feedNoticias.php"><input type="button" name="voltar" id="botaoVoltar" value="Voltar"></a>
        </form>
        </div>
        
    <div id="configDois">
    
    <form name= "infoPrivacidade" method="post" action="alterarPrivacidade.php">
        <h1>Editar Configurações de Privacidade</h1>
        <br/>    
        <h2>Quem pode ver?</h2><br/>
        <p>Minhas Publicações:
        <input type="radio" name="post" id="todos" value="todos"> <label for=todos>Todos</label>
        <input type="radio" name="post" id="somenteAmigos" value="somenteAmigos"> <label for=somenteAmigos>Somente Amigos</label>
        </p><br/>
        <p>Minhas Receitas:
        <input type="radio" name="receitas" id="todosfotos" value="todos"> <label for=todosfotos>Todos</label>
        <input type="radio" name="receitas" id="somenteAmigosfotos" value="somenteAmigos" > <label for=somenteAmigosfotos>Somente Amigos</label>
        </p>
        <br/><br/>        
        <input type="submit" name="salvar" value="Salvar" id="botaoSalvar"/>
        <a href="feedNoticias.php"><input type="button" name="voltar" id="botaoVoltar" value="Voltar"></a>
        </form>
    </div>

    <div id="configTres">
        <form name="infoSeguranca" method="post" action="alterarSeguranca.php" >
        <h1>Editar Configurações de Segurança</h1>
            <br/>
            <p><label for="campo-email">E-mail:</label>
            <input type="email" name="email" id="campo-email" size="50" maxlength='150'></p>
            <br/>
            <p><label for="campo-senha">Senha:</label>
            <input type="password" name="senha" id="campo-senha" maxlength='16'></p>
            <br/><br/>
            <input type="submit" name="salvar" value = "Salvar" id="botaoSalvar"/>
            <a href="feedNoticias.php"><input type="button" name="voltar" id="botaoVoltar" value="Voltar"></a>
        </form>		   	
    </div>
</div>
<script type="text/javascript" src="../js/display.js"></script>
                                   
    </body>
    <script type="text/javascript" src="../js/mensagem_login.js"></script>
</html>

