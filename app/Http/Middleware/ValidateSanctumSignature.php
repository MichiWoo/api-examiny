<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ValidateSanctumSignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->route()->parameter('hash');

        $res = DB::table('verify_emails_tokens')
            ->where('token', $token)
            ->first();

        if (isset($res->expires_at)) {

            if ($res->expires_at < Carbon::now(config('app.timezone'))->format('Y-m-d H:i:s')) {
                return response(Crypt::encryptString(json_encode([
                    'message' => 'El token de verificación ha expirado.',
                    'error' => 'El token de verificación ha superado el tiempo limite para poder verificar tu cuenta, genera uno nuevo.',
                    'code' => '403'
                ])), 403);
            }

            return $next($request);
        } else {
            return response(Crypt::encryptString(json_encode([
                'message' => 'El token de verificación no existe.',
                'error' => 'El token de verificación ha sido eliminado, genera uno nuevo.',
                'code' => '403'
            ])), 403);
        }
    }
}