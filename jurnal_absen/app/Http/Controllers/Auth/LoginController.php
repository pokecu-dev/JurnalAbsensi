<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function ShowLoginForm()
    {
        return view('auth.login');
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
        $role = $user->role;

        if ($role === 'admin') {
            // return response()->json([
            //     'status' => 'admin'
            // ]);
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } elseif ($role === 'guru') {
            // return response()->json([
            //     'status' => 'guru'
            // ]);
            return redirect()->intended(route('guru.dashboard', absolute: false));
        } elseif ($role === 'sekre') {
            // return response()->json([
            //     'status' => 'sekre'
            // ]);
            return redirect()->intended(route('sekre.dashboard', absolute: false));
        } elseif ($role === 'piket') {
            // return response()->json([
            //     'status' => 'piket'
            // ]);
            return redirect()->intended(route('piket.dashboard',absolute:false));

        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Akun Anda tidak memiliki hak akses/role yang valid.'
            ]);
        }
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
