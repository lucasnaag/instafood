<?php
    session_start();    
    $fot = $_POST["receitas"];
    $p = $_POST["post"];
    $mens = 0;
    echo $p;  
    echo $fot;
    if(!empty($fot))
    {
        $mens = 1;   
    }
    if(!empty($p))
    {
        $mens = 1;
    }
    if($mens = 1)
        $_SESSION['Mensagem'] = "Alteração feita com sucesso!";
    }

header("Location: configuracao.php");
    
?>