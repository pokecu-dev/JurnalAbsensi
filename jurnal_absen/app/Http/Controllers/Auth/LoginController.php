<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class LoginController extends Controller
{
    public function ShowLoginForm()
    {
        return view('auth.login');
    }

    public function RoleCheck($role, $request = null)
    {
        if (!$role) {
            return redirect()->route('login');
        }
        if ($role === 'admin') {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } elseif ($role === 'guru') {
            return redirect()->intended(route('guru.dashboard', absolute: false));
        } elseif ($role === 'sekre') {
            return redirect()->intended(route('sekre.dashboard', absolute: false));
        } elseif ($role === 'piket') {
            return redirect()->intended(route('piket.dashboard', absolute: false));
        } else {
            if ($request) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')->withErrors([
                    'email' => 'Akun Anda tidak memiliki hak akses/role yang valid.'
                ]);
            } else {
                return redirect()->route('login');
            }
        }
    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => 'required',
        ]);

        if (!Auth::attempt($validated, $request->remember)) {
            return back()->withErrors([
                'email' => 'Credential does not match '
            ])->onlyInput('email');
        }

        $user = Auth::user();
        $request->session()->regenerate();
        $role = $user->role ?? null;

        return $this->RoleCheck($role, $request);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function Check()
    {
        $user = Auth::user();
        $role = $user->role ?? null;

        return $this->RoleCheck($role);
    }
}
