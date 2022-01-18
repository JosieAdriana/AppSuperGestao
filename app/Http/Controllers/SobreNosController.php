<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    public function __construct(){
        $this->middleware(LogAcessoMiddleware::class);
    }
    
        
    
    public function SobreNos()
    {
        return view('site.sobre-nos', [
            "mensagem" => "Mensagem enviado por parâmetro através do Controlador",
            "data" => date("D/M/Y H:i:s")
        ]);
    }
}
