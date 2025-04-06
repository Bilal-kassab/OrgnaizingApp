<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication System</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .auth-container {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .auth-title {
            font-size: 1.5rem;
            color: #111827;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #374151;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 1rem;
        }
        input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }
        .btn {
            background-color: #6366f1;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            width: 100%;
            font-size: 1rem;
            text-align: center;
            text-decoration: none;
            display: block;
            margin-bottom: 15px;
        }
        .btn:hover {
            background-color: #4f46e5;
        }
        .btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
            border: 1px solid #d1d5db;
        }
        .btn-secondary:hover {
            background-color: #e5e7eb;
        }
        .error-message {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        .auth-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.875rem;
            color: #6b7280;
        }
        .auth-footer a {
            color: #6366f1;
            text-decoration: none;
        }
        .auth-footer a:hover {
            text-decoration: underline;
        }
        .success-message {
            color: #10b981;
            margin-bottom: 20px;
            text-align: center;
        }
        .button-group {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <h1 class="auth-title">Welcome</h1>
        <div class="button-group">
            <a href="{{ route('register') }}" class="btn">Register</a>
            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
        </div>
        <div class="auth-footer">
            <p>Need help? <a href="mailto:support@example.com">Contact support</a></p>
        </div>
    </div>
</body>
</html>
