<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use Illuminate\Contracts\View\View;

class ContatoController extends Controller
{
    public function formularioContato(Request $request): View
    {
        return view('site.contato', [
            'titulo' => 'Contato(teste)2'
        ]);
    }

    public function contato(Request $request): View
    {
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamaçao'
        ];

        return view('site.contato', [
            'titulo' => 'Contato(teste)',
            'motivo_contatos' => $motivo_contatos
        ]);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:40', //nomes com no mínimo 3 caracteres e no máximo 40.
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
        ]);

         SiteContato::create($request->all());
         return redirect()->route('site.index');
    }
}
