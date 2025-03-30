<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SearchUserRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function showProfile(){
        return view('layouts.profile');
    }


    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        $result = [];

        $result = $this->userService->updateProfile($data);

        if ($request->hasFile('image')) {
            $result = $this->userService->updateAvatar($data);

        }

        return back()->with($result['success'] ? 'status' : 'error', $result['message']);
    }


    public function search(SearchUserRequest $request)
    {
        $result = $this->userService->searchUsers($request->input('query'));

        if (!$result['success']) {
            return back()->with('error', $result['message']);
        }

        return view('user/search', [
            'users' => $result['users'],
            'query' => $request->input('query')
        ]);
    }
}
