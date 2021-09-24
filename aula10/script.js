function showModal(){
    document.querySelector(".modal-form").style.display = "flex";
}

function deletar(idFuncionario){

    let confirmacao = confirm("Deseja deletar o funcionário?"); 
        if(confirmacao){
            // window.location = "acaoDeletar.php?id=" = idFuncionario;
            window.location = "acaoDeletar.php?id=" + idFuncionario;
        }
}

function editar (idFuncionario){

    window.location = "editar.php?id=" + idFuncionario;

}

document.querySelector(".btnAddFuncionario")
.addEventListener("click", showModal);