<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // 1) Legacy/session-based role (keamanan backward-compatibility)
        if ($request->session()->get('role') === 'admin') {
            return $next($request);
        }

        // 2) Laravel auth-based check (support if project later adds is_admin or ADMIN_EMAILS)
        if (auth()->check()) {
            $user = auth()->user();

            // preferred: boolean flag on users table
            if (isset($user->is_admin) && $user->is_admin) {
                return $next($request);
            }

            // fallback: list of admin emails via .env (ADMIN_EMAILS=email1,email2)
            $admins = array_filter(array_map('trim', explode(',', env('ADMIN_EMAILS', ''))));
            if (!empty($admins) && in_array($user->email, $admins)) {
                return $next($request);
            }
        }

        // API / AJAX requests -> JSON 403
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Akses ditolak.'], 403);
        }

        // Redirect guest ke halaman login admin dan simpan intended URL
        return redirect()->guest(route('admin.login'))->with('error', 'Akses terbatas — silakan login sebagai admin.');
    }
}
