<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search</title>
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --text: #374151;
            --text-light: #6b7280;
            --bg: #f3f4f6;
            --white: #ffffff;
            --border: #e5e7eb;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --radius: 0.375rem;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .search-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .search-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--text);
        }

        .search-header p {
            color: var(--text-light);
        }

        .search-form {
            max-width: 600px;
            margin: 0 auto 3rem;
        }

        .search-input-group {
            display: flex;
            box-shadow: var(--shadow);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .search-input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            font-size: 1rem;
            outline: none;
        }

        .search-button {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            padding: 0 1.5rem;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .search-button:hover {
            background-color: var(--primary-hover);
        }

        .search-results {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .search-results-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-results-count {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        .user-list {
            list-style: none;
        }

        .user-item {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border);
            transition: background-color 0.2s;
        }

        .user-item:last-child {
            border-bottom: none;
        }

        .user-item:hover {
            background-color: rgba(239, 246, 255, 0.5);
        }

        .user-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 1rem;
            border: 2px solid var(--border);
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .user-email {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .pagination-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 2.5rem;
            min-width: 2.5rem;
            padding: 0 0.5rem;
            margin: 0 0.25rem;
            border-radius: var(--radius);
            background-color: var(--white);
            color: var(--text);
            text-decoration: none;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s;
        }

        .pagination-link:hover {
            background-color: var(--primary);
            color: var(--white);
        }

        .pagination-link.active {
            background-color: var(--primary);
            color: var(--white);
        }

        .no-results {
            padding: 2rem;
            text-align: center;
            color: var(--text-light);
        }

        @media (max-width: 640px) {
            .container {
                padding: 1rem;
            }

            .search-input-group {
                flex-direction: column;
            }

            .search-input {
                border-radius: var(--radius) var(--radius) 0 0;
            }

            .search-button {
                padding: 0.75rem;
                border-radius: 0 0 var(--radius) var(--radius);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-header">
            <h1>Find Users</h1>
            <p>Search by name or email address</p>
        </div>

        <form action="{{ route('users.search') }}" method="GET" class="search-form">
            <div class="search-input-group">
                <input type="text"
                       name="query"
                       class="search-input"
                       placeholder="Enter name or email..."
                       value="{{ request('query') }}"
                       required>
                <button type="submit" class="search-button">Search</button>
            </div>
        </form>

        @if(request()->has('query'))
            <div class="search-results">
                <div class="search-results-header">
                    <h2>Search Results</h2>
                    <span class="search-results-count">
                        {{ $users->total() }} {{ Str::plural('result', $users->total()) }} found
                    </span>
                </div>

                @if($users->count() > 0)
                    <ul class="user-list">
                        @foreach($users as $user)
                            <li class="user-item">
                                <a href="{{ route('profile', $user->id) }}" class="user-link">
                                    <img src="{{ $user->image ? asset('ProfileImage/'.$user->image) : asset('images/default-avatar.png') }}"
                                         alt="{{ $user->name }}"
                                         class="user-avatar">
                                    <div class="user-info">
                                        <h3 class="user-name">{{ $user->name }}</h3>
                                        <p class="user-email">{{ $user->email }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="no-results">
                        <p>No users found matching "{{ request('query') }}"</p>
                    </div>
                @endif
            </div>

            @if($users->hasPages())
                <div class="pagination">
                    @if($users->onFirstPage())
                        <span class="pagination-link disabled">&laquo;</span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="pagination-link">&laquo;</a>
                    @endif

                    @foreach(range(1, $users->lastPage()) as $page)
                        <a href="{{ $users->url($page) }}"
                           class="pagination-link {{ $users->currentPage() === $page ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach

                    @if($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="pagination-link">&raquo;</a>
                    @else
                        <span class="pagination-link disabled">&raquo;</span>
                    @endif
                </div>
            @endif
        @else
            <div class="search-results">
                <div class="no-results">
                    <p>Enter a search term to find users</p>
                </div>
            </div>
        @endif
    </div>
</body>
</html>
