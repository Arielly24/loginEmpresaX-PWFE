<?php

session_start();

require_once("./funcoes.php");

if(isset($_POST["txt_usuario"]) || isset($_POST["txt.senha"])){

    $usuario = $_POST["txt_usuario"];
    $senha = $_POST ["txt_senha"];
    realizarLogin($usuario, $senha, lerArquivo("dados/usuarios.json"));

}else if($_GET["logout"]){

    finalizarLogin();

}

 
?>

