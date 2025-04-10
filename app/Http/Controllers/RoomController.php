<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $roomService;

    public function __construct(RoomService $roomService) {
        $this->roomService = $roomService;
    }

    public function index() {
        $rooms = $this->roomService->getAll();
        return view('rooms.index', compact('rooms'));
    }

    public function create() {
        return view('rooms.create');
    }

    public function store(StoreRoomRequest $request) {
        try {
            $this->roomService->create($request->validated());
            return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error creating room: ' . $e->getMessage());
        }
    }

    public function edit($id) {
        $room = $this->roomService->findById($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(UpdateRoomRequest $request, $id) {
        try {
            $room = $this->roomService->findById($id);
            $this->roomService->update($room, $request->validated());
            return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error updating room: ' . $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $room = $this->roomService->findById($id);
            $this->roomService->delete($room);
            return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting room: ' . $e->getMessage());
        }
    }
}
