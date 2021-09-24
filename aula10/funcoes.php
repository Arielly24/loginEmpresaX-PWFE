<?php

//recebe o nome do arquivo

function lerArquivo($nomeArquivo){
    //le o arquivo como string
    $arquivo = file_get_contents($nomeArquivo);
    
    //transforma string em array
    $jsonArray = json_decode($arquivo);

    //deolve o array
    return $jsonArray;
}

//busca o funcionario dentro da lista e devolve uma lista com funcionarios encontrados
function buscarFuncionario ($funcionarios, $first_name){

    $funcionariosFiltro = [];
    foreach ($funcionarios as $funcionario){
    if($funcionario -> first_name == $first_name){
    $funcionariosFiltro[] = $funcionario;
        }

    }
 return $funcionariosFiltro;

}

function buscarFuncionarioPorId ($nomeArquivo, $funcionario){
    $funcionarios = lerArquivo($nomeArquivo); 
    foreach($funcionarios as $funcionario){

        if ($funcionario->id == $funcionario) {
            return $funcionario;

        }
    } 
    
}

function adicionarFuncionario($nomeArquivo, $novoFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);

}


function deletarFuncionario ($nomeArquivo, $idFuncionario){

    $funcionarios = lerArquivo($nomeArquivo);
    foreach($funcionarios as $chave => $funcionario){

        if($funcionario->id == $idFuncionario){
            unset($funcionarios[$chave]);
        }
        function editarFuncionario ($nomeArquivo, $funcionarioEditado){
            $funcionario = lerArquivo($nomeArquivo);
            foreach ($funcionarios as $chave => $funcionario){
                if ($funcionario->id == $funcionarioEditado["id"]) {
                    $funcionarios[$chave] = $funcionarioEditado;
                }
            }
        }

        $json = json_encode(array_values($funcionarios));

        file_put_contents($nomeArquivo, $json);

    }


} 

//processo de login para a empresax

// function lerArquivo($nomeArquivo){

//     $arquivo = file_get_contents($nomeArquivo);

//     $arquivoArr = json_decode($arquivo);

//     return $arquivoArr;

// }

function realizarLogin ($usuario, $senha, $dados){
    foreach($dados as $dado){
        if ($dado->usuario == $usuario && $dado->senha == $senha) {
            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date("d/m/y - h : i : s");

            header("location: empresax.php"); 
            exit;
            
        }
        
    }
    header("location: empresax.php");
}

    function verificarLogin(){
        if($_SESSION["id"] != session_id() || (empty($_SESSION["id"])) ){
            header("location: empresax.php");
        }
    }
    function finalizarLogin (){
        session_unset();
        session_destroy();

        header("location: index.php");
    }

