<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Room;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAll($roomId) {
        return Task::where('room_id',$roomId)->latest()->get();
    }

    public function findById($id) {
        return Task::findOrFail($id);
    }

    public function create(array $data) {
        return Task::create($data);
    }

    public function update($id, array $data) {
        $task = $this->findById($id);
        $task->update($data);
        return $task;
    }

    public function delete($id) {
        $task = $this->findById($id);
        return $task->delete();
    }
}
