<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../../../db.php";
require_once "../../../wp-config.php";

$db = new DB(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

if(isset($_POST['cadastrar_email'])){
    $nome = $_POST['nome_setor'];
    $email = $_POST['email_setor'];

    if(strlen($nome) >= 255){
        $nome = substr($nome, 0, 254);
    }
    if(strlen($email) >= 100){
        $email = substr($email, 0, 19);
    }

    $sql = "
        INSERT INTO email(nome_setor, email, ativo) VALUES
        (?, ?, 'A')
    ";

    $db->query($sql);
    $db->bind(1, $nome);
    $db->bind(2, $email);

    if($db->execute()){
        echo "Sucesso!";
        header("refresh:2; url=".get_site_url()."/index.php/cadastro-emails/");
    }
    else{
        echo "Falhou!";
        header("refresh:2; url=".get_site_url()."/index.php/cadastro-emails/");
    }
}
elseif(isset($_POST['excluir'])){
    $id = $_POST['id_excluir'];

    $sql = "UPDATE email SET ativo = 'E' WHERE id = ".$id;
    $db->query($sql);

    if($db->execute()){
        echo "Sucesso!";
        header("refresh:2; url=".get_site_url()."/index.php/gerenciar-email/");
    }
    else{
        echo "Falhou!";
        header("refresh:2; url=".get_site_url()."/index.php/gerenciar-email/");
    }
}
elseif(isset($_POST['editar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome_setor'];
    $email = $_POST['email_setor'];

    $sql = "
        UPDATE email SET
        nome_setor = '".$nome."',
        email = '".$email."'
        WHERE id = ".$id."
    ";

    $db->query($sql);

    if($db->execute()){
        echo "Sucesso!";
        header("refresh:2; url=".get_site_url()."/index.php/gerenciar-email/");
    }
    else{
        echo "Falhou!";
        // echo "<textarea>".$sql."</textarea>";
        header("refresh:2; url=".get_site_url()."/index.php/gerenciar-email/");
    }
}


?>