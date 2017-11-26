<?php
function getConnection(){
    // Lendo o arquivo de configuração dbconfig.ini
    $config = parse_ini_file("C:/dbconfig.ini", true);
    // Atribuindo informações do arquivo para as variáveis de conexão
    $host = $config['BANCO']['host'];
    $database = $config['BANCO']['db'];
    $usuario = $config['BANCO']['user'];
    $password = $config['BANCO']['pass'];    
    // Criando a conexão ao banco de dados através do PDO
    try{
        $pdo = new PDO("mysql:host=".$host.";dbname=".$database, $usuario, $password);
        return $pdo;
    }
    // Erro caso não consiga conectar
    catch(PDOException $e){
        return array("conexao"=>NULL, "mensagem"=>"Ocorreu o seguinte erro:<br>".$e->getMessage());
    }
}
//$pdo = new PDO("mysql:host=Localhost;dbname=brasfood", "root", "2142"); 

/*
teste de conexao
if (!$pdo)
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
else
echo "Conexao sucesso";


$teste = connect();
print_r($teste);
*/
?>