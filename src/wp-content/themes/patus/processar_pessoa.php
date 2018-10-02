<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../../db.php";
require_once "../../../wp-config.php";

$db = new DB(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

if(isset($_POST['cadastrar_pessoa'])){
    $nome = $_POST['pessoa_nome'];

    if(isset($_POST['pessoa_nome'])){
        $ramal = $_POST['pessoa_ramal'];
    }
    else{
        $ramal = NULL;
    }
    if(isset($_POST['pessoa_data_nasc'])){
        $dataNascimento = $_POST['pessoa_data_nasc'];
    }
    else if($_POST['pessoa_data_nasc'] == ''){
        $dataNascimento = NULL;
    }
    else{
        $dataNascimento = NULL;
    }

    if(strlen($nome) >= 255){
        $nome = substr($nome, 0, 254);
    }
    if(strlen($ramal) >= 20){
        $ramal = substr($ramal, 0, 19);
    }

     /*
    $sql = "
        INSERT INTO pessoa(nome, ramal, data_nascimento, ativo) VALUES
        (?, ?, ?, 'A')
    ";

    $db->query($sql);
    $db->bind(1, $nome);
    $db->bind(2, $ramal);
    $db->bind(3, $dataNascimento);
    */

    if($dataNascimento == NULL){
        $sql = "
            INSERT INTO pessoa(nome, ramal, data_nascimento, ativo) VALUES
            ('".$nome."', '".$ramal."', NULL, 'A')
        ";
    }
    else{
        $sql = "
            INSERT INTO pessoa(nome, ramal, data_nascimento, ativo) VALUES
            ('".$nome."', '".$ramal."', '".$dataNascimento."', 'A')
        ";
    }
    $db->query($sql);

    if($db->execute()){
        echo "Sucesso!";
        header("refresh:2; url=".get_site_url()."/index.php/cadastro-pessoas/");
    }
    else{
        echo "Falhou!";
    }
}
elseif(isset($_POST['excluir'])){
    $id = $_POST['id_excluir'];

    $sql = "UPDATE pessoa SET ativo = 'E' WHERE id = ".$id;
    $db->query($sql);

    if($db->execute()){
        echo "Sucesso!";
        header("refresh:2; url=".get_site_url()."/index.php/gerenciar-pessoas/");
    }
    else{
        echo "Falhou!";
        header("refresh:2; url=".get_site_url()."/index.php/gerenciar-pessoas/");
    }
}
elseif(isset($_POST['editar'])){
    $id = $_POST['id'];
    $nome = $_POST['pessoa_nome'];

    if(isset($_POST['pessoa_nome'])){
        $ramal = $_POST['pessoa_ramal'];
    }
    else{
        $ramal = NULL;
    }
    if(isset($_POST['pessoa_data_nasc'])){
        $dataNascimento = $_POST['pessoa_data_nasc'];
    }
    else if($_POST['pessoa_data_nasc'] == ''){
        $dataNascimento = NULL;
    }
    else{
        $dataNascimento = NULL;
    }

    if(strlen($nome) >= 255){
        $nome = substr($nome, 0, 254);
    }
    if(strlen($ramal) >= 20){
        $ramal = substr($ramal, 0, 19);
    }

    if($dataNascimento == NULL){
        $sql = "
           UPDATE pessoa SET
           nome = '".$nome."',
           ramal = '".$ramal."',
           data_nascimento = NULL
           WHERE id = ".$id."
        ";
    }
    else{
        $sql = "
           UPDATE pessoa SET
           nome = '".$nome."',
           ramal = '".$ramal."',
           data_nascimento = '".$dataNascimento."'
           WHERE id = ".$id."
        ";
    }
    $db->query($sql);

    if($db->execute()){
        echo "Sucesso!";
        header("refresh:2; url=".get_site_url()."/index.php/gerenciar-pessoas/");
    }
    else{
        echo "Falhou!";
        echo "<textarea>".$sql."</textarea>";
        header("refresh:2; url=".get_site_url()."/index.php/gerenciar-pessoas/");
    }
}

?>