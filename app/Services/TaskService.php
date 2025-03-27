<?php

namespace App\Services;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Room;
use Exception;

class TaskService
{
    protected $taskRepository;
    public function __construct(TaskRepositoryInterface $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks($roomId) {
        $room=Room::findOrFail($roomId);
        return $this->taskRepository->getAll($roomId);
    }

    public function getTaskById($id) {
        return $this->taskRepository->findById($id);
    }

    public function createTask(array $data) {
        try {
            return $this->taskRepository->create($data);
        } catch (Exception $e) {
            throw new Exception('Unable to create task.');
        }
    }

    public function updateTask($id, array $data) {
        try {
            return $this->taskRepository->update($id, $data);
        } catch (Exception $e) {
            throw new Exception('Unable to update task.');
        }
    }

    public function deleteTask($id) {
        try {
            return $this->taskRepository->delete($id);
        } catch (Exception $e) {

            throw new Exception('Unable to delete task.');
        }
    }
}
