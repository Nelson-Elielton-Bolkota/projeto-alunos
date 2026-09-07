<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Trata a requisição de entrada para verificar o perfil (role) do usuário.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user() || $request->user()->role !== $role) {
            // Retorna um erro HTTP 403 (Acesso Proibido) se não tiver permissão
            abort(403, 'Acesso não autorizado para o seu perfil de usuário.');
        }

        return $next($request);
    }
}
