<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\{
    RegisterRequest,
    LoginRequest
};

use App\Models\{
    User,
};

use Illuminate\Support\Facades\{
    Auth,
    Hash,
};

class AuthController extends BaseController
{
    public function register(RegisterRequest $request)
    {
        $request->validated();
        $validated = $request->safe()->only(
            [
                'name',
                'email',
                'password',
                'password_confirmed',
                'role_id',
            ]
        );

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        $success['token'] = $user->createToken('intranet', [$user->role->slug])->plainTextToken;
        return $this->sendResponse('Usuário cadastrado com sucesso!', $success);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->safe()->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'unauthorized', 'message' => 'Não autorizado!'], 401);
        }

        $user = Auth::user();
        $response['token'] = $user->createToken(
            'intranet',
            [$user->role->slug]
        )->plainTextToken;
        $response['name'] = $user->name;

        return $this->sendResponse('Usuário logado com sucesso!', $response);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->sendResponse('Usuário deslogado do sistema!');
    }
}
