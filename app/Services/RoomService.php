<?php

namespace App\Services;

use App\Interfaces\RoomRepositoryInterface;
use App\Models\Room;

class RoomService
{
    protected $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo) {
        $this->roomRepo = $roomRepo;
    }

    public function getAll() {
        return $this->roomRepo->getAll();
    }

    public function findById($id) {
        return $this->roomRepo->findById($id);
    }

    public function create(array $data) {

        $room =$this->roomRepo->create($data);
    return $room;
    }

    public function update($roomId, array $data) {

         $room= $this->roomRepo->update($roomId, $data);
        //  dd($data);
         return $room;
    }

    public function delete(Room $room) {
        return $this->roomRepo->delete($room);
    }
}
