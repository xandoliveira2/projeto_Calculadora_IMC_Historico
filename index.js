function calcularIMC(altura, peso) {
    return (peso / (altura * altura)).toFixed(2);
}

module.exports = { calcularIMC };
