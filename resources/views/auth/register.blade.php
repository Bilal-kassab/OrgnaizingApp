<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial System - Register</title>
    <style>
        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #3498db;
            color: #334155;
            line-height: 1.5;
        }

        /* Container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
        }

        /* Card */
        .card {
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 28rem;
            padding: 2rem;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            color: #1e293b;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #64748b;
            font-size: 0.875rem;
        }

        /* Form */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #1e293b;
        }

        .form-control {
            width: 100%;
            padding: 0.625rem 0.875rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: border-color 0.15s;
        }

        .form-control:focus {
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Avatar Upload */
        .avatar-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .avatar-preview {
            width: 5rem;
            height: 5rem;
            border-radius: 9999px;
            background-color: #f1f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-bottom: 0.75rem;
            border: 2px solid #e2e8f0;
        }

        .avatar-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar-upload label {
            cursor: pointer;
            color: #3b82f6;
            font-weight: 500;
            font-size: 0.875rem;
            text-align: center;
        }

        .avatar-upload input[type="file"] {
            display: none;
        }

        /* Button */
        .btn {
            width: 100%;
            padding: 0.625rem;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.15s;
        }

        .btn:hover {
            background-color: #2563eb;
        }

        /* Footer */
        .footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.875rem;
        }

        .footer a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Errors */
        .error {
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }
        .eye-icon {
        width: 20px;
        height: 20px;
        fill: #6b7280;
        transition: fill 0.2s;
    }

    .toggle-password:hover .eye-icon {
        fill: #4b5563;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <h1>Create Account</h1>
                <p>Register to access the financial system</p>
            </div>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf



                <!-- Name -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>

                 <!-- Avatar Upload -->
                 <div class="avatar-upload">
                    <div class="avatar-preview" id="avatarPreview">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="#94a3b8">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                    <label for="avatar">
                        Upload Profile Photo (Optional)
                        <input type="file" id="avatar" name="avatar" accept="image/*">
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn">Register</button>
            </form>

            <div class="footer">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
            </div>
        </div>
    </div>
</body>
</html>
