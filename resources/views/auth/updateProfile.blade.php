<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile</title>
  <style>
    :root {
      --primary: #6366f1;
      --primary-dark: #4f46e5;
      --danger: #ef4444;
      --danger-dark: #dc2626;
      --gray-light: #f3f4f6;
      --gray-dark: #6b7280;
      --white: #ffffff;
      --shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: var(--gray-light);
      color: #333;
      padding: 10px;
    }

    .header {
      background-color: var(--white);
      padding: 15px;
      box-shadow: var(--shadow);
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      border-radius: 8px;
    }

    .container {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .profile-sidebar,
    .profile-content {
      background: var(--white);
      border-radius: 8px;
      box-shadow: var(--shadow);
      padding: 20px;
    }

    .profile-img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 15px;
      display: block;
      border: 4px solid var(--gray-light);
    }

    .profile-name {
      text-align: center;
      font-size: 1.25rem;
      margin-bottom: 5px;
    }

    .profile-email {
      text-align: center;
      font-size: 0.95rem;
      color: var(--gray-dark);
      margin-bottom: 15px;
    }

    .btn {
      padding: 10px 15px;
      border-radius: 4px;
      text-align: center;
      font-weight: 500;
      text-decoration: none;
      display: inline-block;
      border: none;
      cursor: pointer;
    }

    .btn-primary {
      background-color: var(--primary);
      color: var(--white);
    }

    .btn-danger {
      background-color: var(--danger);
      color: var(--white);
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .form-group input:focus {
      border-color: var(--primary);
      outline: none;
      box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
    }

    @media (min-width: 768px) {
      .container {
        flex-direction: row;
      }

      .profile-sidebar {
        width: 250px;
      }

      .profile-content {
        flex: 1;
      }
    }
  </style>
</head>
<body>
  @include('layouts.header')

  <div class="container">
    <div class="profile-sidebar">
      <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : 'https://via.placeholder.com/150' }}" alt="Profile Image" class="profile-img" />
      <h2 class="profile-name">{{ Auth::user()->name }}</h2>
      <p class="profile-email">{{ Auth::user()->email }}</p>
    </div>

    <div class="profile-content">
      <h2 style="margin-bottom: 20px;">Update Profile</h2>

      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Profile Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
    </div>
  </div>
  <div style="height:75px"></div>
  @include('layouts.footer')
</body>
</html>
