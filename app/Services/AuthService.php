<?php 
namespace App\Services;

use Illuminate\Support\Facades\Hash;

class AuthService {

    public function login($user, $request) {
        if($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                if(!empty($user->verified)) {
                    session(['user_id' => $user->id]);
                    return response()->json([
                        'status'    =>  true,
                        'message'   =>  "Logged!"
                    ]);
                } else {
                    return response()->json([
                        'status'    =>  false,
                        'message'   =>  "Your account not verified yet, check your email to verify!"
                    ]);
                }
            } else {
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  "Wrong password!"
                ]);
            }
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  "Email not registered!"
            ]);
        }
    }
}