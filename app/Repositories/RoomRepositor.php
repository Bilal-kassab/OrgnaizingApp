<?php

namespace App\Repositories;

use App\Interfaces\RoomRepositoryInterface;
use App\Models\Room;

class RoomRepositor implements RoomRepositoryInterface
{
    public function getAll() {
        return Room::isMember(auth()->id())->latest()->get();
    }

    public function findById($id) {
        return Room::findOrFail($id);
    }

    public function create(array $data) {
        return Room::create($data);
    }

    public function update(Room $room, array $data) {
        $room->update($data);
        return $room;
    }

    public function delete(Room $room) {
        return $room->delete();
    }
}
