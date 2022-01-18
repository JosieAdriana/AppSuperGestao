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

        $regras =  [
            'nome' => 'required|min:3|max:40|unique:site_contatos', //nomes com no mínimo 3 caracteres e no máximo 40.
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
        ];

        $feedback = [

            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
            'nome.unique' => 'O nome informado já está em uso.',
            'email.email' => 'O email informado não é válido.',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres.',
            'required' => 'O campo :attribute deve ser preenchido!',
        ];

        $request->validate(
            $regras,
            $feedback


        );

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
