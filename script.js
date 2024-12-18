const form = document.getElementById("imcForm");
const historicoBody = document.getElementById("historicoBody");
const message = document.getElementById("message");

// Dados simulados como banco de dados
let historico = [];
let id = 1;

// Função para calcular IMC
function calcularIMC(altura, peso) {
    return (peso / (altura * altura)).toFixed(2);
}

// Função para obter a classificação do IMC
function classificarIMC(imc) {
    if (imc < 18.5) return "Abaixo do peso";
    if (imc < 24.9) return "Peso ideal";
    if (imc < 29.9) return "Sobrepeso";
    if (imc < 34.9) return "Obesidade I";
    if (imc < 39.9) return "Obesidade II";
    return "Obesidade III";
}

// Renderizar histórico na tabela
function renderHistorico() {
    historicoBody.innerHTML = "";
    historico.forEach((item, index) => {
        historicoBody.innerHTML += `
            <tr>
                <td>${item.id}</td>
                <td>${item.altura} m</td>
                <td>${item.peso} kg</td>
                <td>${item.imc}</td>
                <td>${item.classificacao}</td>
                <td><button class="excluir-btn" onclick="excluirRegistro(${index})">Excluir</button></td>
            </tr>
        `;
    });
}

// Excluir registro
function excluirRegistro(index) {
    historico.splice(index, 1);
    renderHistorico();
}

// Salvar e processar o formulário
form.addEventListener("submit", (e) => {
    e.preventDefault();
    const altura = parseFloat(document.getElementById("altura").value);
    const peso = parseFloat(document.getElementById("peso").value);

    const imc = calcularIMC(altura, peso);
    const classificacao = classificarIMC(imc);

    historico.unshift({
        id: id++,
        altura: altura.toFixed(2),
        peso: peso.toFixed(2),
        imc,
        classificacao,
    });

    message.innerHTML = `Cálculo de IMC registrado com sucesso! ${classificacao}, parabéns!`;
    renderHistorico();

    form.reset();
});
