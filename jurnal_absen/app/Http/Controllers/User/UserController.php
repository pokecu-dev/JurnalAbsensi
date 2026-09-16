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
            'nip' => ['required', 'string', 'digits:18', 'unique:users,nip'],
            // 'nuptk' => ['required', 'string', 'digits:16', 'unique:users,nuptk'],
            'phone' => ['required', 'string', 'unique:users,phone'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
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

    public function delete(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $user->delete();

        return response()->json([
            'status' => 'success'
        ]);
        // return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function update(Request $request, User $user)
    {
        if ($request->phone) {
            $request->merge([
                'phone' => User::formatPhone($request->phone),
            ]);
        }

        $validator = Validator::make($request->all(), [
            'nip' => ['required', 'string', 'digits:18',Rule::unique('users','nip')->ignore($user->id)],
            // 'nuptk' => ['required', 'string', 'digits:16',Rule::unique('users','nuptk')->ignore($user->id)],
            'phone' => ['required', 'string', 'regex:/^\+62 \d{3}-\d{4}-\d{4,}$/',Rule::unique('users','phone')],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', Rule::unique('users','phone')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required', Rule::in(['admin', 'guru', 'sekre', 'piket'])],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->onlyInput();
        }

        $validated = $validator->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'status' => 'succes',
            'data' => $user
        ]);
    }
}
