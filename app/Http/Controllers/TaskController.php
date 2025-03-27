<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }

    public function roomTasks($roomId) {
        $tasks = $this->taskService->getAllTasks($roomId);
        return view('tasks.index', compact('tasks','roomId'));
    }

    public function create($roomId) {
        return view('tasks.create',compact($roomId));
    }

    public function store(StoreTaskRequest $request,$roomId) {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $task= $this->taskService->createTask($data);
            // Redirect to the room's task list
        return redirect()->route('tasks.index', ['room_id' => $task->room_id])
        ->with('success', 'Task created successfully.');

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id) {
        try {
            $task = $this->taskService->getTaskById($id);
            return view('tasks.edit', compact('task'));
        } catch (Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Task not found.');
        }
    }

    public function update(UpdateTaskRequest $request, $id) {
        try {
            $this->taskService->updateTask($id, $request->validated());
            return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->taskService->deleteTask($id);
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        } catch (Exception $e) {
            return redirect()->route('tasks.index')->with('error', $e->getMessage());
        }
    }
}
