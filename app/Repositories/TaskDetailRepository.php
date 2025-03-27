<?php

namespace App\Repositories;

use App\Interfaces\TaskDetailRepositoryInterface;
use App\Models\TaskDetail;

class TaskDetailRepository implements TaskDetailRepositoryInterface
{
    public function getAll() {
        return TaskDetail::latest()->get();
    }

    public function getByTaskId($taskId) {
        return TaskDetail::where('task_id', $taskId)->latest()->get();
    }
    
    public function findById($id) {
        return TaskDetail::findOrFail($id);
    }

    public function create(array $data) {
        return TaskDetail::create($data);
    }

    public function update($id, array $data) {
        $taskDetail = $this->findById($id);
        $taskDetail->update($data);
        return $taskDetail;
    }

    public function delete($id) {
        $taskDetail = $this->findById($id);
        return $taskDetail->delete();
    }
}
