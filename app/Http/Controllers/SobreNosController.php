<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    
    
    public function SobreNos()
    {
        return view('site.sobre-nos', [
            "mensagem" => "Mensagem enviado por parâmetro através do Controlador",
            "data" => date("D/M/Y H:i:s")
        ]);
    }
}
