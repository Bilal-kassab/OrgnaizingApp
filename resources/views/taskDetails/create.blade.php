@extends('layouts.app')

@section('title', 'Add Task Detail')
@section('styles')
<link rel="stylesheet" href="{{asset('css/tasks/create.css')}}">
@endsection
@section('content')
    <div class="container-div">
        <h2 class="title">Add New Task Detail</h2>

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('taskDetails.store') }}" method="POST">
            @csrf

            <!-- Body -->
            <div class="form-group">
                <label>Body</label>
                <input type="text" name="body" >
                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>


            <!-- Money (Optional) -->
            <div class="form-group">
                <label>Price (optional)</label>
                <input type="number" name="price" value="0.00" >
                @error('price')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Room ID (Hidden) -->
            <input type="hidden" name="task_id" value="{{ $taskId }}">

            <!-- Submit Button -->
             <div class="form-actions">
                <button class="btn" type="submit">Create Task</button>
            </div>
        </form>
    </div>
@endsection
