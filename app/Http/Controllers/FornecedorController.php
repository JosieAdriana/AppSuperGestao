<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();

       // dd($fornecedores);


        /*
            INSERT INTO fornecedores (nome, site, uf, email) VALUES ('João', 'joao.com', 'RS', 'joao@gmail.com');
        */

        // $fornecedores = [
        //     [
        //         'nome' => 'fornecedor 1',
        //         'status' => 'N',
        //         'cnpj' => '0',
        //         'ddd' => '51', // Grande Porto Alegre (RS)
        //         'telefone' => '996338705',
        //     ],
        //     [
        //         'nome' => 'fornecedor 2',
        //         'status' => 'S',
        //         'cnpj' => '0',
        //         'ddd' => '11', // São Paulo (SP)
        //         'telefone' => '995000000',
        //     ],
        //     [
        //         'nome' => 'fornecedor 3',
        //         'status' => 'S',
        //         'cnpj' => '02.664.774,0001-42',
        //         'ddd' => '32', // Juiz de Fora (MG)
        //         'telefone' => '996000000'
        //     ]
        // ];

        // $fornecedores = [];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
