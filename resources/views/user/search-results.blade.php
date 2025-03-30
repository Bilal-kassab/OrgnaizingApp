<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --gray-light: #f3f4f6;
            --gray-dark: #6b7280;
            --white: #ffffff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .search-header {
            background-color: var(--white);
            padding: 20px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .search-button {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .search-button:hover {
            background-color: var(--primary-dark);
        }

        .results-count {
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .user-list {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .user-item {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            transition: background-color 0.2s;
        }

        .user-item:last-child {
            border-bottom: none;
        }

        .user-item:hover {
            background-color: #f8f9fa;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 2px solid var(--gray-light);
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-email {
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }

        .page-link {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            color: var(--primary);
            text-decoration: none;
        }

        .page-link:hover, .page-link.active {
            background-color: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        .no-results {
            padding: 30px;
            text-align: center;
            color: var(--gray-dark);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-header">
            <h1>Search Users</h1>
            <form action="{{ route('users.search') }}" method="GET" class="search-form">
                <input type="text"
                       name="query"
                       class="search-input"
                       placeholder="Search by name or email..."
                       value="{{ $query }}"
                       required>
                <button type="submit" class="search-button">Search</button>
            </form>
            <div class="results-count">
                Found {{ $users->total() }} {{ Str::plural('result', $users->total()) }}
            </div>
        </div>

        <div class="user-list">
            @if($users->count() > 0)
                @foreach($users as $user)
                    <div class="user-item">
                        <img src="{{ $user->image ? asset('ProfileImage/'.$user->image) : asset('images/default-avatar.png') }}"
                             alt="{{ $user->name }}"
                             class="user-avatar">
                        <div class="user-info">
                            <div class="user-name">{{ $user->name }}</div>
                            <div class="user-email">{{ $user->email }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-results">
                    No users found matching "{{ $query }}"
                </div>
            @endif
        </div>

        @if($users->hasPages())
            <div class="pagination">
                @if(!$users->onFirstPage())
                    <a href="{{ $users->previousPageUrl() }}" class="page-link">&laquo; Previous</a>
                @endif

                @foreach($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                    <a href="{{ $url }}" class="page-link {{ $users->currentPage() == $page ? 'active' : '' }}">
                        {{ $page }}
                    </a>
                @endforeach

                @if($users->hasMorePages())
                    <a href="{{ $users->nextPageUrl() }}" class="page-link">Next &raquo;</a>
                @endif
            </div>
        @endif
    </div>
</body>
</html>
