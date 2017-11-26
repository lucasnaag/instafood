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
        .form-center{
            margin-top: -10%;
            
        }
        </style>
    </head>
    <body>
        <div class="folha background-folha">
            <ul class="topo">
                <li class="topo-logo">
                    <a href="../index.php"><img src="../imagens/logo-nome.png" alt="BRASSFOOD marca registrada - USF 2017" title="BRASSFOOD logotipo"></a>
                </li>
            </ul>
            <div class="center">
                <form action="redefinirSenha.php" method="post" class="form-center">
                    <div class="senha">
                    <table>
                        <tr>
                            <td class="table-um"><label for="email" class="recuperacao">E-mail de recuperação:</label></td>
                            <td class="table-dois"><input type="text" class="campo-email" name="email" id="email" placeholder="E-mail de recuperação"></td>
                        </tr>
                        <tr>
                            <td class="table-um"><label for="emailConfirmacao" class="recuperacao">Confirme o e-mail:</label></td>
                            <td class="table-dois"><input type="text" class="campo-email" name="emailConfirmacao" id="emailConfirmacao" placeholder="E-mail de recuperação"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit">Enviar</button></td>
                        </tr>
                    </table>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>