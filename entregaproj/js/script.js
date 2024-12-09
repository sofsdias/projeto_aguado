
const listas = document.querySelectorAll(".treinosli"); // selecionando todas as listas

listas.forEach(lista => { //adicionar o event listener a cada lista
    lista.addEventListener("click", function(event) {
        if (event.target.closest("li")) {
            event.target.closest("li").classList.toggle('completed'); // altera a classe
        }
    });
});


