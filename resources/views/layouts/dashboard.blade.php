<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: fixed;
            height: 100vh;
        }
        .main-content {
            flex: 1;
            margin-left: 250px;
        }
        .header {
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }
        .profile-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #6366f1;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #4f46e5;
        }
        .btn-logout {
            background-color: #ef4444;
        }
        .btn-logout:hover {
            background-color: #dc2626;
        }
        .nav-menu {
            list-style: none;
            margin-top: 30px;
        }
        .nav-item {
            margin-bottom: 10px;
        }
        .nav-link {
            display: block;
            padding: 10px 15px;
            color: #374151;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #e0e7ff;
            color: #4f46e5;
        }
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4f46e5;
            margin-bottom: 30px;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <a href="#" class="logo">MyApp</a>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link">Profile</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Settings</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Messages</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Reports</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header class="header">
            <h1>Dashboard</h1>
            <a href="{{ route('logout') }}" class="btn btn-logout">Logout</a>
        </header>

        <div class="container">
            <div class="profile-card">
            <img src="{{ Auth::user()->image ? asset('ProfileImage/'.Auth::user()->image) : 'https://via.placeholder.com/100' }}"
                alt="Profile Image"
                class="profile-img"
                id="profile-image">
                <h2 id="user-name">{{ Auth::user()->name }}</h2>
                <p>Welcome to your dashboard!</p>
                <a href="{{ route('profile') }}" class="btn">View Full Profile</a>
            </div>
        </div>
    </div>
</body>
</html>
