<?php

namespace App\Repositories;

use App\Interfaces\RoomRepositoryInterface;
use App\Models\Room;
use App\Models\Task;
use Auth;

class RoomRepositor implements RoomRepositoryInterface
{
    public function getAll() {
        return Room::isMember(auth()->id())->latest()->get();
    }

    public function findById($id) {
        return Room::findOrFail($id);
    }

    public function create(array $data) {
        $room =Room::create([
            "name"=>$data['name'],
            "description"=>$data['description'],
            "wallet"=>$data['wallet'],
            "owner_id"=>auth()->id()
        ]);
        return $room;

    }

    public function update($roomId, array $data) {
        // dd($roomId);
        $room=$this->findById($roomId);
        $room->update($data);
        // $room->save();
        return $room;
    }

    public function delete(Room $room) {
        return $room->delete();
    }
}
