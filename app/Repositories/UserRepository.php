<?php

namespace App\Repositories;

use App\Interfaces\ProfileRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface
{
    public function updateProfile(array $data)
    {

        $user = User::find(Auth::user()->id);
        $user->name = $data['name'];
        $user->save();

        return $user;
    }

    public function updateAvatar(array $data)
    {

        $user = User::find(Auth::user()->id);

        // Delete old avatar if exists
        if(File::exists($user->image))
        {
            File::delete($user->image);
        }

        // Store new avatar
        if($data['image']){
            $image = $data['image'];
            $image_name=time() . '.' . $image->getClientOriginalExtension();
            $image->move('ProfileImage/',$image_name);
            $user->image="ProfileImage/".$image_name;
            $user->save();
        }

        return $user;
    }

    public function searchUsers(string $query)
    {
        return User::where('name', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->paginate(10);
    }

}
