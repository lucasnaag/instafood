<?php
    session_start();

    require_once "seguranca.php";

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    valida_login($usuario, $senha);
?>