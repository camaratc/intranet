<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../../db.php";
require_once "../../../wp-config.php";

$db = new DB(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

if(isset($_POST['cadastrar_pessoa'])){
    $nome = $_POST['pessoa_nome'];
    $ramal = $_POST['pessoa_ramal'];
    $dataNascimento = $_POST['pessoa_data_nasc'];

    if(strlen($nome) >= 255){
        $nome = substr($nome, 0, 254);
    }
    if(strlen($ramal) >= 20){
        $ramal = substr($ramal, 0, 19);
    }

    $sql = "
        INSERT INTO pessoa(nome, ramal, data_nascimento, ativo) VALUES
        (?, ?, ?, 'A')
    ";

    $db->query($sql);
    $db->bind(1, $nome);
    $db->bind(2, $ramal);
    $db->bind(3, $dataNascimento);

    if($db->execute()){
        echo "Sucesso!";
        header("refresh:2; url=".get_site_url()."/index.php/cadastro-pessoas/");
    }
    else{
        echo "Falhou!";
    }
}
?>