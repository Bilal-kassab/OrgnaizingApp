@extends('layouts.app')

@section('title', 'Task Details for Task')

@section('content')
<h2>Task Details for Task #{{ $taskId }}</h2>

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

<!-- Add New Task Detail Button -->
<a href="{{route('taskDetails.create',$taskId)}}" class="btn btn-add">Add New Detail</a>

@if($taskDetails->isEmpty())
    <p class="message error">There are no details for this task.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>NUM</th>
                <th>Body</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($taskDetails as $taskDetail)
                <tr>
                    <td>{{ $taskDetail->id }}</td>
                    <td>{{ $taskDetail->body }}</td>
                    <td>{{ $taskDetail->price }}</td>
                    <td>{{ date('Y-m-d', strtotime($taskDetail->created_at)) }}</td>

                    <td style="display: flex; justify-content: space-around;">
                        <a href="#" class="btn btn-edit">Edit</a>

                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
