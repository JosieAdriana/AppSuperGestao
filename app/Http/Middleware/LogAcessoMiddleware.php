<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LogAcesso;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //$request - manipular 
        //return $next($request);
       //dd($request->all());

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);

        return Response('Chegamos no middleware e finalizamos no próprio middleware');
    }
}
