// Importando a função calcularIMC do arquivo index.js
const { calcularIMC } = require("./index"); 

function rodarTeste(altura, peso, resultadoEsperado) {
    const resultado = calcularIMC(altura, peso);
    if (resultado === resultadoEsperado) {
        console.log(`Teste PASSSOU para altura ${altura} e peso ${peso}. IMC: ${resultado}`);
    } else {
        console.log(`Teste FALHOU para altura ${altura} e peso ${peso}. Esperado: ${resultadoEsperado}, Obtido: ${resultado}`);
    }
}

// Rodando os testes
rodarTeste(1.75, 70, "22.86");
rodarTeste(1.60, 50, "19.53");
rodarTeste(1.80, 90, "27.78");
rodarTeste(1.50, 45, "20.00");
rodarTeste(1.70, 110, "38.06");
rodarTeste(2.00, 100, "25.00");
rodarTeste(1.60, 40, "15.63");
