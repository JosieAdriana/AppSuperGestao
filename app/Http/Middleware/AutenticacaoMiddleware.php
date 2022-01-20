<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        //verifica se o usuario possui acesso a rota
        echo $metodo_autenticacao. '-'.$perfil. '<br>';

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos'. '<br>';
        }else {
            echo 'Carregar perfil no banco de dados'. '<br>';
        }



        if($metodo_autenticacao == 'padrao'){
            echo 'Verificar o usuário e senha no banco de dados'.$perfil. '<br>';
        }

        if($metodo_autenticacao == 'ldap'){
            echo 'Verificar o usuário e senha no AD'.$perfil. '<br>';
        }

        if(false) {
            return $next($request);
            
        }else{
            return Response('Acesso negado! Rota exige autenticação!!');
        }
        
    }
}
