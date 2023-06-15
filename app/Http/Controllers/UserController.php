<?php

namespace App\Http\Controllers;

use App\Actions\StoreUserAction;
use App\Actions\UpdateUserAction;
use App\Actions\UserLoginAction;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Response|ResponseFactory
    {
        return paginatedJsonSuccessResponse(UserResource::collection(User::query()->simplePaginate(10)));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, StoreUserAction $action): Application|Response|ResponseFactory
    {
        return $action->handle($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        return jsonSuccessResponse(new UserResource($user));
    }

    /**
     * Update the specified user account
     */
    public function update(UserUpdateRequest $request, User $user, UpdateUserAction $action): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        return $action->handle($user, $request);
    }

    /**
     * Login User
     */
    public function login(UserLoginRequest $request, UserLoginAction $action): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        return $action->handle($request);
    }
    public function googleAuth(): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $user = Socialite::driver('google')->stateless()->user();
        logger('### Authenticated Google User ###');
        logger($user->getName());
        return jsonSuccessResponse($user);
    }
}
