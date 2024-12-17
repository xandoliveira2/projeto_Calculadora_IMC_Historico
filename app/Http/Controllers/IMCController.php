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
