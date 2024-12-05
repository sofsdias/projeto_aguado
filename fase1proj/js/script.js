function validarCampo(){
    const email=document.getElementById("email").value; //guarda o valor do que ta no email na constante email
    if (!email){
        document.getElementById("fazerlogin").disabled = true;
    } else if (validarEmail(email)) {
        document.getElementById("fazerlogin").disabled = false;
    }

}

function validarEmail(email){
    return /\S+@\S+\.\S+/.test(email);

}


const listas = document.querySelectorAll(".treinosli"); // selecionando todas as listas

listas.forEach(lista => { //adicionar o event listener a cada lista
    lista.addEventListener("click", function(event) {
        if (event.target.closest("li")) {
            event.target.closest("li").classList.toggle('completed'); // altera a classe
        }
    });
});


