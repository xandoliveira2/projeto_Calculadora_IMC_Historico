<?php
 namespace App\Http\Controllers;

 use Illuminate\Http\Request;
 use App\Models\IMCCalculation;

 class IMCController extends Controller
 {


     public function index()
     {
         // Recuperar todos os cálculos do banco de dados
         $calculations = IMCCalculation::orderBy('created_at', 'desc')->get();

         // Retornar a view com os cálculos
         return view('imc.index', compact('calculations'));
     }
     public function calculate(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'height' => 'required|numeric|min:0.5|max:3', // Altura em metros
            'weight' => 'required|numeric|min:10|max:500', // Peso em kg
        ]);

        // Obter altura e peso do formulário
        $height = $request->input('height');
        $weight = $request->input('weight');

        // Calcular o IMC
        $bmi = $weight / ($height * $height);

        // Determinar a mensagem com base no IMC
        $message = '';
        if ($bmi < 18) {
            $message = 'Abaixo do peso, seria interessante buscar uma nutricionista e aumentar o consumo de nutrientes.';
        } elseif ($bmi >= 18 && $bmi < 25) {
            $message = 'Peso ideal, parabéns! Continue assim.';
        } else {
            $message = 'Sobrepeso, busque uma nutricionista e uma atividade física.';
        }

        // Armazenar o cálculo no banco de dados
        IMCCalculation::create([
            'height' => $height,
            'weight' => $weight,
            'bmi' => $bmi,
        ]);

        // Redirecionar para a página inicial com a mensagem personalizada
        return redirect()->route('imc.index')->with('success', "Cálculo de IMC registrado com sucesso! $message");
    }

     public function destroy($id)
{
    // Procurar o cálculo pelo ID
    $calculation = IMCCalculation::findOrFail($id);

    // Excluir o cálculo
    $calculation->delete();

    // Redirecionar para a página inicial com uma mensagem de sucesso
    return redirect()->route('imc.index')->with('success', 'Cálculo excluído com sucesso!');
}


}
