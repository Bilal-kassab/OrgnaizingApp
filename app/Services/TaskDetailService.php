<?php

namespace App\Services;

use App\Interfaces\TaskDetailRepositoryInterface;
use App\Models\Task;

class TaskDetailService
{
    protected $taskDetailRepository;

    public function __construct(TaskDetailRepositoryInterface $taskDetailRepository) {
        $this->taskDetailRepository = $taskDetailRepository;
    }

    public function getAllTaskDetails() {
        return $this->taskDetailRepository->getAll();
    }

    public function getTaskDetailsByTaskId($taskId) {
        Task::findOrFail($taskId);
        return $this->taskDetailRepository->getByTaskId($taskId);
    }

    public function getTaskDetailById($id) {
        return $this->taskDetailRepository->findById($id);
    }

    public function createTaskDetail($data) {

        $taskDetail=$this->taskDetailRepository->create($data);
        
        return $taskDetail;
    }

    public function updateTaskDetail($id, $data) {
        return $this->taskDetailRepository->update($id, $data);
    }

    public function deleteTaskDetail($id) {
        return $this->taskDetailRepository->delete($id);
    }
}
