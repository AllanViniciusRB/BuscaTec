function mostrarSenha() {
    var inputPass = document.getElementById('senha');
    var btnShowPass = document.getElementById('btnsenha');

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
}

function mostrarConfirmarSenha() {
    var inputConfirmarSenha = document.getElementById('confirmasenha');
    var btnShowConfirmarSenha = document.getElementById('btnconfirmarsenha');

    if (inputConfirmarSenha.type === 'password') {
        inputConfirmarSenha.setAttribute('type', 'text');
        btnShowConfirmarSenha.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    } else {
        inputConfirmarSenha.setAttribute('type', 'password');
        btnShowConfirmarSenha.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
}
