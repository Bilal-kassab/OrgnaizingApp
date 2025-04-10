@include('layouts.header')
<div class="container">
    <h1>My Rooms</h1>
    <a href="{{ route('rooms.create') }}">
    <button type="submit" class="btn btn-primary">Create Room</button>
    </a>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($rooms as $room)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->name }}</h5>
                        <p class="card-text">{{ Str::limit($room->description, 100) }}</p>
                        <p class="card-text"><strong>Wallet:</strong> ${{ number_format($room->wallet, 2) }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div style="height: 75px;"></div>
@include('layouts.footer')
