<?php

namespace App\Actions;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;

class UpdateUserAction
{
    public function handle(User $user, UserUpdateRequest $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        try {
            if($user->update($request->validated()))
                return jsonSuccessResponse(new UserResource($user));
        } catch (Exception $exception) {
            report($exception);
        }
        return jsonErrorResponse();
    }
}
