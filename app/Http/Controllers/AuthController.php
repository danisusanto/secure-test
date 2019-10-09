<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\storeUser;
use App\UserModel;
use App\Notifications\UserVerification;
use App\Services\AuthService;

class AuthController extends Controller
{
    
    public function login(): object
    {
        return view('auth.login');
    }
    
    public function register(): object
    {
        return view('auth.register');
    }

    public function registerAction(storeUser $request): object
    {
        if($request->validated()) {
            $password = Hash::make($request->input('password'), [
                'rounds'    =>  10
            ]);
            $user_model = new UserModel();
            $user_model->username = strip_tags($request->input('username'));
            $user_model->email = $request->input('email');
            $user_model->password = $password;
            try {
                $user_model->save();
                $user_model->notify(new UserVerification($user_model->id, $user_model->username));
                return response()->json([
                    'status'    =>  true,
                    'message'   =>  'user registered successfully'
                ]);
            } catch (\Throwable $error) {
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  $error
                ]);
            }
        }
    }

    public function verify(int $id=null,$username=null)
    {
        if($id) {
            try {
                $user_model = UserModel::findOrFail($id);
                $user_model->verified = 1;
                $user_model->save();
            } catch (\Throwable $error) {
                throw $error;
            }
        }
        return view('auth.verify');
    }

    public function loginAction(Request $request): object
    {
        $user_model = new UserModel();
        $user = $user_model->findByEmail($request->input('email'));
        $auth_service = new AuthService();
        return $auth_service->login($user,$request);
    }

    public function LogoutAction(): object {
        session()->flush();
        return redirect('auth/login');
    }
}
