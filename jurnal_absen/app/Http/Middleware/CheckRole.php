<?php

namespace App\Http\Middleware;

use App\Models\JadwalPiket;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role ): Response
    {

        // $uri = $request->route() ? $request->route()->uri : null;

        $RouteisPiket = $request->is('piket*');
        // dd([$uri,$RouteisPiket]);

        $user = $request->user();

        if (! $user) {
            return redirect('/');
            // abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        $allowedRoles = explode(',', $role);

        if ($user->role === 'guru' && $RouteisPiket) {
            $isJadwalPiket = JadwalPiket::GetJadwalPiketBy($user->id, 1);
            if (! $isJadwalPiket) {
                abort(403, 'Anda tidak memiliki akses karena saat ini bukan jadwal piket Anda.');
            }
        }

        if (! in_array($user->role, $allowedRoles)) {
            return redirect('/');
            // abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
