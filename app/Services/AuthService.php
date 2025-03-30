<?php

namespace App\Services;

use App\Interfaces\AuthRepositoryInterface;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(array $data)
    {

        try {
            $user = $this->authRepository->register($data);
            if($data['image']){
                $image = $data['image'];
                $image_name=time() . '.' . $image->getClientOriginalExtension();
                $image->move('ProfileImage/',$image_name);
                $user->image="ProfileImage/".$image_name;
                $user->save();
            }
            auth()->login($user);
            return ['success' => true, 'message' => 'Registration successful'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Registration failed: ' . $e->getMessage()];
        }
    }

    public function login(array $credentials)
    {
        if ($this->authRepository->login($credentials)) {
            return ['success' => true, 'message' => 'Login successful'];
        }
        return ['success' => false, 'message' => 'Invalid credentials'];
    }

    public function logout()
    {
        try {
            $this->authRepository->logout();
            return ['success' => true, 'message' => 'Logout successful'];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Logout failed: ' . $e->getMessage()];
        }
    }

    public function forgotPassword(array $data)
    {
        try {
            $success = $this->authRepository->forgotPassword($data);
            return [
                'success' => $success,
                'message' => $success
                    ? 'Password reset link sent to your email'
                    : 'Unable to send password reset link'
            ];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }

    public function resetPassword(array $data)
    {
        try {
            $success = $this->authRepository->resetPassword($data);
            return [
                'success' => $success,
                'message' => $success
                    ? 'Password reset successfully'
                    : 'Unable to reset password'
            ];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
}
