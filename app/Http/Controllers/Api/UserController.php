<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection as ARC;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserSaveRequest;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(): ARC
    {
        $users = User::with('user')->paginate(10);;
        return UserResource::collection($users);
    }

    public function store(UserSaveRequest $request): UserResource
    {
        $user = User::create($request->validated());
        return UserResource::make($user);
    }

    public function show(User $user): UserResource
    {
        return UserResource::make($user);
    }

    public function update(UserSaveRequest $request, User $user): UserResource
    {
        $user->update($request->validated());
        return UserResource::make($user);
    }

    public function destroy(User $user): Response
    {
        $user->delete();
        return response()->noContent();
    }
}
