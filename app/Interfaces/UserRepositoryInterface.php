<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{

    public function updateProfile(array $data);
    public function updateAvatar(array $data);
    public function searchUsers(string $query);
}
