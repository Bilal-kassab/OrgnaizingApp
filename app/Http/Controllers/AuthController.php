<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Include the avatar in the validated data
        $validatedData = $request->validated();


        if(!$request->hasFile('image')){
            $validatedData['image']=null;
        }
        $result = $this->authService->register($validatedData);

        if ($result['success']) {
            return redirect('/dashboard')->with('success', $result['message']);
            // return redirect()->route('dashboard');
        }

        return back()->with('error', $result['message'])->withInput();
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $result = $this->authService->login($request->validated());

        if ($result['success']) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => $result['message'],
        ])->withInput($request->only('email'));
    }


    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request): RedirectResponse
    {
        $result = $this->authService->forgotPassword($request->validated());

        if ($result['success']) {
            return back()->with('status', $result['message']);
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => $result['message']]);
    }


    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(ResetPasswordRequest $request): RedirectResponse
    {
        $result = $this->authService->resetPassword($request->validated());

        if ($result['success']) {
            return redirect('/login')->with('status', $result['message']);
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => $result['message']]);
    }


    public function logout()
    {

        $result = $this->authService->logout();

        if ($result['success']) {
            return redirect('/app')->with('success', $result['message']);
        }

        return back()->with('error', $result['message'])->withInput();


    }

}
