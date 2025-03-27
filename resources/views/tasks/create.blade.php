@extends('layouts.app')

@section('title', 'Create Task')
@section('styles')
<link rel="stylesheet" href="{{asset('css/tasks/create.css')}}">
@endsection
@section('content')
    <div class="container-div">
        <h2 class="title">Create New Task</h2>

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <!-- Task Name -->
            <div class="form-group">
                <label>Task Name</label>
                <input type="text" name="name" >
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" ></textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Money (Optional) -->
            <div class="form-group">
                <label>Money (optional)</label>
                <input type="number" name="money" value="0.00" >
                @error('money')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Room ID (Hidden) -->
            <input type="hidden" name="room_id" value="{{ $roomId }}">

            <!-- Submit Button -->
             <div class="form-actions">
                <button class="btn" type="submit">Create Task</button>
            </div>
        </form>
    </div>
@endsection
