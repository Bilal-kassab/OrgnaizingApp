<?php

namespace App\Services;

use App\Interfaces\ProfileRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function updateProfile(array $data)
    {
        try {
            $user = $this->userRepository->updateProfile($data);
            return [
                'success' => true,
                'user' => $user,
                'message' => 'Profile updated successfully'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Profile update failed: ' . $e->getMessage()
            ];
        }
    }

    public function updateAvatar(array $data)
    {

        try {
            $user = $this->userRepository->updateAvatar($data);
            return [
                'success' => true,
                'user' => $user,
                'message' => 'Avatar updated successfully'
            ];
        } catch (\Exception $e) {
            // Delete the uploaded file if update failed
            if (isset($data['image']) && $data['image']->isValid()) {
                Storage::disk('public')->delete($data['image']->hashName());
            }
            return [
                'success' => false,
                'message' => 'Avatar update failed: ' . $e->getMessage()
            ];
        }
    }

    public function searchUsers(string $query)
    {
        try {
            $users = $this->userRepository->searchUsers($query);

            return [
                'success' => true,
                'users' => $users,
                'message' => 'Users found successfully'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Search failed: ' . $e->getMessage()
            ];
        }
    }
}
