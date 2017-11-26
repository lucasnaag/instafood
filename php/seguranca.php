<?php
    /* Chamada de métodos e libs */
    if(!isset($_SESSION)) session_start();
    require_once "conexao.php";
    //require_once "hashing.php";

    /* Variaveis globais importantes */ 
    
    /* Funções de validação e segurança */ 
    function valida_login($usuario, $senha)
    {
        $pdo = getConnection();
        $sql = "SELECT * FROM usuarios WHERE email = '".$usuario."' AND senha = '".$senha."' LIMIT 1";
        $consulta = $pdo->query($sql);
        $consulta = $consulta->fetch();

        if($consulta)
        {
            $_SESSION['UsuarioLogado'] = $consulta["Nome"];
            $_SESSION['NomeCompleto'] = $consulta['Nome']." ".$consulta['Sobrenome'];
            $_SESSION['UsuarioLogin'] = $consulta['Email'];
            $_SESSION['UsuarioSenha'] = $consulta['Senha'];
            $_SESSION['IDLogado'] = $consulta['IDUser'];
            
            header("Location: feedNoticias.php");
        } else
        {
            $_SESSION['Mensagem'] = "Não foi possível completar o login. <br>Verifique as informações e tente novamente.";
            header("Location: ../index.php");
        }
    }

    function desconectar_login()
    {
        if(session_destroy()) header("Location: ../index.php");
        else echo "error";
    }

    function acesso_seguro(){
        if (!isset($_SESSION['UsuarioLogado']) OR !isset($_SESSION['NomeCompleto']) OR 
            !isset($_SESSION['UsuarioLogin']) OR !isset($_SESSION['UsuarioSenha']))
        {
            desconectar_login();
        }
    }
?>