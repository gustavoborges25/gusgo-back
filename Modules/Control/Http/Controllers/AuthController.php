<?php

namespace Modules\Control\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
use App\User;
use Modules\Control\Http\Requests\AuthRequest;

class AuthController extends Controller
{
    /**
     * Authenticate the posted user.
     *
     * @return Response
     */
    public function authenticate(AuthRequest $request)
    {
        $loginData['password'] = $request->password;
        $email = $request->email;

        $user = User::getUserByEmail($email);
        $loginData['email'] = $user->email;

        if (!$user || ! $token = JWTAuth::attempt($loginData)) {
            return $this->errorHandlerForLogin($user);
        }

        return response()->json(compact('token'));
    }

    public function errorHandlerForLogin($user)
    {
        $mensagem = 'Usuário ou senha incorretos';
        $indice = 'email';

        if ($user && !$user->situation) {
            $mensagem = 'Usuário inativo!';
            $indice = 'situation';
        }

        return $this->mensagemError($indice, $mensagem);
    }

    public function mensagemError($indice, $mensagem)
    {
        return response()->json([
            'errors' => [
                $indice => [
                    $mensagem,
                ],
            ],
        ], 422);
    }

    /**
     * Recover the passwor of a user by its e-mail.
     *
     * @param  Request $request Default request from Laravel
     * @return Response
     */
//    public function recoverPassword(Request $request)
//    {
//        $user = User::where('email', $request->email)->first();
//
//        if (!$user) {
//            return response()->json(['error' => 'E-mail não encontrado!'], 401);
//        }
//
//        $newPassword = str_random(8);
//        $user->password = bcrypt($newPassword);
//        $user->save();
//
//        DB::table('password_resets')->insert([
//            'email' => $user->email,
//            'token' => bcrypt($newPassword),
//        ]);
//
//        Mail::to($user->email)->queue(new RecoverPasswordEmail($user, $newPassword));
//
//        return response()->json([
//            'message' => 'As instruções de recuperação foram enviadas para o e-mail!',
//        ], 200);
//    }

    /**
     * Register a new user to the system
     */
//    public function register(RegisterRequest $request)
//    {
//        $user = new User();
//        $user->fill($request->all());
//
//        $user->password = bcrypt($request->password);
//        $user->situation = 2;
//        $user->save();
//
//        return response(null, 204);
//    }
}
