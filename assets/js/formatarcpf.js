// formatarcpf.js

function formatarCPF() {
    //le o cpf
    var camposCPF = document.querySelectorAll('input[type="cpf"]');

    
    camposCPF.forEach(function (campo) {
        campo.addEventListener('input', function (e) {
            //so são permitidos numeros
            var cpf = e.target.value.replace(/\D/g, '');

            // adiciona os pontos de 3 em 3 e no final os ultimos dois digitos do cpf
            if (cpf.length >= 3) {
                cpf = cpf.replace(/^(\d{3})(\d)/, '$1.$2');
            }
            if (cpf.length >= 6) {
                cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
            }
            if (cpf.length >= 9) {
                cpf = cpf.replace(/(\d{3})(\d)/, '$1-$2');
            }

            e.target.value = cpf;
        });
    });
}

