@include('layouts.header')
<div class="container">
    <h1>Create New Room</h1>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Room Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="wallet">Initial Wallet Amount</label>
            <input type="number" step="0.01" class="form-control" id="wallet" name="wallet" value="0">
        </div>

        <button type="submit" class="btn btn-primary">Create Room</button>
    </form>
</div>
<div style="height: 75px;"></div>
@include('layouts.footer')
