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
            min-height: 100vh;
        }

        /* Mobile First Approach */
        .sidebar {
            width: 100%;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 100;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .main-content {
            padding: 20px;
            padding-bottom: 80px; /* Space for mobile bottom nav */
        }

        .header {
            background-color: white;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .container {
            max-width: 100%;
        }

        .profile-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .btn {
            background-color: #6366f1;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            margin: 10px 5px;
            width: calc(50% - 10px);
            text-align: center;
            font-size: 14px;
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

        .btn-room {
            background-color: #10b981;
        }

        .btn-room:hover {
            background-color: #059669;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            width: 100%;
            justify-content: space-around;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            text-align: center;
        }

        .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 8px;
            color: #374151;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
            font-size: 12px;
        }

        .nav-link i {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .nav-link:hover, .nav-link.active {
            color: #4f46e5;
        }

        .logo {
            display: none; /* Hidden on mobile */
        }

        /* Desktop Styles */
        @media (min-width: 768px) {
            body {
                display: flex;
            }

            .sidebar {
                width: 250px;
                height: 100vh;
                position:fixed;
                top: 0;
                left: 0;
                flex-direction: column;
                justify-content: flex-start;
                padding: 20px;
            }

            .main-content {
                margin-left: 250px;
                padding: 20px;
                padding-bottom: 20px;
            }

            .nav-menu {
                flex-direction: column;
                align-items: flex-start;
                margin-top: 30px;
            }

            .nav-link {
                flex-direction: row;
                padding: 10px 15px;
                width: 100%;
                text-align: left;
            }

            .nav-link i {
                margin-right: 10px;
                margin-bottom: 0;
            }

            .logo {
                display: block;
                font-size: 1.5rem;
                font-weight: bold;
                color: #4f46e5;
                margin-bottom: 30px;
                text-align: center;
            }

            .btn {
                width: auto;
                padding: 8px 16px;
                margin: 10px 0;
            }
        }
    </style>
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

     <!-- Sidebar Navigation - Mobile Bottom Nav -->
 <div class="sidebar">
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rooms.index') }}" class="nav-link">
                    <i class="fas fa-envelope"></i>
                    <span>MyRoom</span>
                </a>
            </li>
        </ul>
    </div>

</body>
</html>
