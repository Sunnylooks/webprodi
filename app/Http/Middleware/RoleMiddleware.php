<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role, string $ownership = null)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }

        $allowed = false;
        if ($role === 'superadmin') {
            $allowed = $user->role === 'superadmin';
        } elseif ($role === 'kaprodi' || $role === 'admin') {
            // Allow both superadmin and kaprodi to access admin routes
            $allowed = in_array($user->role, ['superadmin', 'kaprodi'], true);
        }

        if (!$allowed) {
            abort(403);
        }

        if ($ownership === 'program' && $user->role === 'kaprodi') {
            $programId = (int) ($request->route('program')?->id ?? $request->route('program_id') ?? 0);
            if ($programId && $user->program_id !== $programId) {
                abort(403);
            }
        }

        return $next($request);
    }
}

