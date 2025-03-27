@extends('layouts.app')

@section('title', 'Update Task')
@section('styles')
<link rel="stylesheet" href="{{asset('css/tasks/create.css')}}">
@endsection
@section('content')
    <div class="container-div">
        <h2 class="title">Update Task</h2>

        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
            {{--  --}}
        <form action="{{ route('tasks.update') }}" method="POST">
            @csrf

            <!-- Task Name -->
            <div class="form-group">
                <label>Task Name</label>
                <input type="text" name="name" value="{{$task->name}}" >
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label>Description</label>
                <textarea name="description"  >{{$task->description}}</textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Money (Optional) -->
            <div class="form-group">
                <label>Money (optional)</label>
                <input type="number" name="money" value="{{ $task->money }}" step="0.01" min="0">
                @error('money')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>


            <!-- Room ID (Hidden) -->
            <input type="hidden" name="id" value="{{ $task->id }}">

            <!-- Submit Button -->
             <div class="form-actions">
                <button class="btn" type="submit">Update Task</button>
            </div>
        </form>
    </div>
@endsection
