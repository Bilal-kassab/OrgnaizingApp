@include('layouts.header')
<div class="container">
    <h1>Edit Room: {{ $room->name }}</h1>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Room Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $room->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $room->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="wallet">Wallet Amount</label>
            <input type="number" step="0.01" class="form-control" id="wallet" name="wallet" value="{{ $room->wallet }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
</div>

<div style="height: 75px;"></div>
@include('layouts.footer')
