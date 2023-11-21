document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
        const nome = document.getElementById("nome").value;
        const email = document.getElementById("email").value;
        const cpf = document.getElementById("cpf").value;
        const fone = document.getElementById("fone").value;
        const senha = document.getElementById("senha").value;
        const confirmarSenha = document.getElementById("confirmasenha").value;

        if (nome === "" || email === "" || cpf === "" || fone === "" || senha === "" || confirmarSenha === "") {
            event.preventDefault(); // impede o envio do cadastro se os campos estiverem vazio
            alert("Por favor, preencha todos os campos obrigatórios.");
        }
    });
});