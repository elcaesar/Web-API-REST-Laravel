<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
	//registrar nuevo usuario con rol_id->3 (Alumno)
    public function signup(Request $request)
    {
        //creamos la validación
        $validator = Validator::make($request->all(), [
        'rol_id' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'confirm_password' => 'required|same:password',
        ]);

        // se valida, si falla se devuelve error en json
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }

        //creamos el usuario
        $input = $request->all();
        $input['password'] = bcrypt($request->get('password'));
        $user = User::create($input);

        //creamos el token y se lo enviamos al usuario
        $token =  $user->createToken('MyApp')->accessToken;
        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }

    //Login de usuario registrado
    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Ingreso no autorizado'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
        ]);
    }

    //logout o salir del sistema
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Salió del Sistema (Logged out)!']);
    }

    //Leer un usuario
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

}
