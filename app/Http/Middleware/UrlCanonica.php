<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UrlCanonica
{
    /**
     * Em produção, redireciona com 301 para o esquema e o domínio do APP_URL
     * (ex.: http:// ou www. para https://dominio), para o Google ver uma única versão de cada página.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! app()->isProduction()) {
            return $next($request);
        }

        $canonica = parse_url(config('app.url'));
        $esquema = $canonica['scheme'] ?? 'https';
        $host = $canonica['host'] ?? $request->getHost();

        if ($request->getScheme() !== $esquema || $request->getHost() !== $host) {
            return redirect()->to($esquema.'://'.$host.$request->getRequestUri(), 301);
        }

        $resposta = $next($request);

        if ($esquema === 'https') {
            $resposta->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        $resposta->headers->set('X-Content-Type-Options', 'nosniff');
        $resposta->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        return $resposta;
    }
}
