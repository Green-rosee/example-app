<?php

namespace App\Repository\User;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function store(UserStoreRequest $userStoreRequest): User
    {
        dd($userStoreRequest->file('avatar'));

        $validated = $userStoreRequest->validated();
        $newUser = new User();

        $newUser->name = $validated['name'];
        $newUser->email = $validated['email'];
        $newUser->password = $validated['password'];
        $newUser->save();

        return $newUser;
    }

    public function update(UserUpdateRequest $userUpdateRequest, User $user): User
    {
        $user->name = $userUpdateRequest->name;
        $user->email = $userUpdateRequest->email;
        if($userUpdateRequest->password){
            $user->password = bcrypt($userUpdateRequest->password);
        }
        $user->save();
        return $user;
    }

    public function destroy(User $user): bool
    {
        return $user->delete();
    }
}
