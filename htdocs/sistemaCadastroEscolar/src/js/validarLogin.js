
const validarForms = document.getElementById('validar');
validarForms.addEventListener('submit', function (valido) {
    valido.preventDefault();

    const nome = validarForms.nome.value;
    const cpf = validarForms.cpf.value;
    const datanasc = validarForms.datanasc.value;
    const escola = validarForms.escola.value;
    const senha = validarForms.senha.value;

    if (nome.trim() === '') {
        alert('Por favor, preencha o campo Nome Completo.');
        return;
    }

    if (cpf.trim() === '') {
        alert('Por favor, preencha o campo CPF.');
        return;
    }

    if (datanasc.trim() === '') {
        alert('Por favor, preencha o campo Data de Nascimento.');
        return;
    }

    if (escola.trim() === '') {
        alert('Por favor, preencha o campo Escola Vinculada.');
        return;
    }

    if (senha.trim() === '') {
        alert('Por favor, preencha o campo Senha.');
        return;
    }
    validarForms.submit();
});