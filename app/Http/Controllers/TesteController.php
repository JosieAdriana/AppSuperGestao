<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1, int $p2)
    {
        
    
         //return view('site.teste', ["soma" => $soma,

         // "multiplicacao" => $multiplicacao, //array associativo

         //return view('site.teste', compact('p1', 'p2')); //compact

         return view('site.teste')->with('xyz', $p1)->with('zzz', $p2); //with


        
    }
}
