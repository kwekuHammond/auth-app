<?php

namespace App\Actions;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StoreUserAction
{
    public function handle(StoreUserRequest $request): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        try {
            DB::beginTransaction();
            $user = User::query()->create($request->validated());
            $token = $user->createToken('api-token');
            $user->token = $token->plainTextToken;
            DB::commit();

            return jsonSuccessResponse([new UserResource($user)]);
        } catch (Exception $exception) {
            report($exception);
            DB::rollBack();
        }
        return jsonErrorResponse();
    }
}
