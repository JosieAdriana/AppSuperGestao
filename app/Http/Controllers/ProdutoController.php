<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Item;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe'])->paginate(10);

        /*
        foreach($produtos as $key => $produto){
           // print_r($produto->getAttributes());
           // echo '<br><br>';

            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtoDetalhe)){
              // print_r($produtoDetalhe->getAttributes()); 

               $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
               $produtos[$key]['largura'] = $produtoDetalhe->largura;
               $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }
           // echo '<hr>';
        }
       */
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $regras = [
        'nome' => 'required|min:3|max:40',
        'descricao' => 'required|min:3|max:2000',
        'peso' => 'required|integer',
        'unidade_id' => 'exists:unidades,id',
       ];
       
       $feedback = [
        'required' => 'O campo nome deve ser preenchido',
        'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
        'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
        'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
        'descricao.max' => 'O campo descrição deve ter no máximo 40 caracteres',
        'peso.integer' => 'O campo peso deve ser um número inteiro',
        'unidade_id.exists' => 'A unidade de medida informada não existe'
        
       ];

       $request->validate($regras, $feedback);
       
        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto): View
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {   
        $unidades = Unidade::all();
        //return view( 'app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        //return view( 'app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        print_r($request->all()); //payload
        echo '<br><br><br>';
        print_r($produto->getAttributes()); //instancia do objeto no estado anterior

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}    
