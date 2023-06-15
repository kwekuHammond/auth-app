<?php

namespace App\Actions;

use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserLoginAction
{
    public function handle(UserLoginRequest $request){
        try{
            $credentials  = $request->only('email', 'password');
            if(!Auth::guard('user')->attempt($credentials, true)){
                return jsonErrorResponse('credentials mismatch', 401);
            }
            $user = Auth::guard('user')->user();
            logger("### Logged In User ###");
            logger($user);

            $token = $user->createToken('api-token');
            $user->token = $token->plainTextToken;

            return jsonSuccessResponse([new UserResource($user)]);

        }catch(Exception $exception){
            report($exception);
        }
        return jsonErrorResponse();
    }
}
