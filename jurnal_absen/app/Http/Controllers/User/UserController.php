<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function GetAllUsers()
    {
        return response()->json([
            'status' => 'success',
            'data' => User::all()
        ]);
    }

    public function create(Request $request)
    {

        $request->merge([
            'phone' => $request->phone ? User::formatPhone($request->phone) : null,
        ]);

        $validator = Validator::make($request->all(), [
            'nip' => ['required', 'string', 'digits:18'],
            'nuptk' => ['required', 'string', 'digits:16'],
            'phone' => ['required', 'string'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'role' => ['nullable', 'string', Rule::in(['guru', 'piket', 'admin', 'sekre'])]
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $validated = $validator->validated();
        $validated['role'] = $validated['role'] ?? 'guru';
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $validated
        ]);
    }

    public function delete(Request $request) {
        // if($user->id === Auth::id())
    }
}
