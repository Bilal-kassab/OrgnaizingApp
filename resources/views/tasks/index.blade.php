@extends('layouts.app')

@section('title', 'Tasks for Room')

@section('content')
<h2>Tasks for Room #{{ $roomId }}</h2>

<!-- Success/Error Messages -->
@if(session('success'))
    <div class="message success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="message error">{{ session('error') }}</div>
@endif

@section('styles')
<link rel="stylesheet" href="{{ asset('css/tasks/index.css') }}">
@endsection
<!-- Add New Task Button -->
<a href="{{ route('tasks.create', $roomId) }}" class="btn">Add New Task</a>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn">View</a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No tasks found for this room.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
