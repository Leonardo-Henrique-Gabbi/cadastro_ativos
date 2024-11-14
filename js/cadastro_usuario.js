function validarSenha() {
    const senha = document.getElementById("senha").value;
    const mensagem = document.getElementById("mensagem");

    // Verifica se a senha tem entre 6 e 10 caracteres
    if (senha.length < 6 || senha.length > 10) {
        mensagem.textContent = "A senha deve ter entre 6 e 10 caracteres.";
        mensagem.style.color = "red";
        return false;
    }

    // Verifica se a senha contém pelo menos um número
    if (!/[0-9]/.test(senha)) {
        mensagem.textContent = "A senha deve conter pelo menos um número.";
        mensagem.style.color = "red";
        return false;
    }

    // Verifica se a senha contém pelo menos uma letra
    if (!/[a-zA-Z]/.test(senha)) {
        mensagem.textContent = "A senha deve conter pelo menos uma letra.";
        mensagem.style.color = "red";
        return false;
    }

};
