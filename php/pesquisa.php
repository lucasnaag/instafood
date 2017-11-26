<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>INSTAFOOD</title>
        <meta charset="utf-8">
        <link rel="icon" 
        type="image/jpg" 
        href="../imagens/logo.png" />
        <link rel="stylesheet" href="../css/estilos.css">
        <style>
        .topo-logo{
            width: 20%;
        }
        h1{
            font-family: Arial;
            margin-top: 12%;
        }
        h2{
            font-family: arial;
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
                        <form action="../php/pesquisa.php" method="post" class="pesquisa">
                            <input type="search" name="busca" id="busca" placeholder="Digite o que procura...">
                            <input type="image" height="25px" width="25px" src="../imagens/icons/compass.png" alt="icone de pesquisa">
                        </form>
                    </li>
                    <li class="topo-icons">
                        <a href="perfilUsuario.php"><img height="25px" width="25px" src="../imagens/icons/avatar.png" alt="icone perfil de usuario"></a>
                        <a href="configuracao.php"><img height="25px" width="25px" src="../imagens/icons/settings-1.png" alt="icone de configuração de conta"></a>
                        <a href="../php/desconectarConta.php"><img height="25px" width="25px" src="../imagens/icons/logout.png" alt="icone de logout/exit session"></a>
                    </li>          
                </ul>
            </div>
            <div class="center">
              <h1>PÁGINA EM CONSTRUÇÃO</h1>
                <img src="../imagens/construcao.png" alt="">
                <h2>Em breve mais uma funcionalidade para você nosso querido usuário do INSTAFOOD.</h2>
            </div>
        </div>
    </body>
</html>