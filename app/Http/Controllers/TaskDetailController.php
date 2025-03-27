<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskDetail\StoreTaskDetailRequest;
use App\Http\Requests\TaskDetail\UpdateTaskDetailRequest;
use App\Models\TaskDetail;
use App\Services\TaskDetailService;
use Exception;
use Illuminate\Http\Request;

class TaskDetailController extends Controller
{
    protected $taskDetailService;

    public function __construct(TaskDetailService $taskDetailService) {
        $this->taskDetailService = $taskDetailService;
    }

    public function index($taskId) {
        $taskDetails = $this->taskDetailService->getTaskDetailsByTaskId($taskId);
        return view('taskDetails.index', compact('taskDetails', 'taskId'));
    }

    public function create($taskId) {
        return view('taskDetails.create', compact('taskId'));
    }

    public function store(StoreTaskDetailRequest $request) {
        try {
            $data = $request->validated();

            $this->taskDetailService->createTaskDetail($data);

            return redirect()->route('taskDetails.index', $data['task_id'])
                             ->with('success', 'Task detail created successfully.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id) {
        $taskDetail = $this->taskDetailService->getTaskDetailById($id);
        return view('taskDetails.edit', compact('taskDetail'));
    }

    public function update(UpdateTaskDetailRequest $request, $id) {
        try {
            $this->taskDetailService->updateTaskDetail($id, $request->validated());
            return redirect()->route('taskDetails.index')->with('success', 'Task detail updated successfully.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $this->taskDetailService->deleteTaskDetail($id);
            return redirect()->route('taskDetails.index')->with('success', 'Task detail deleted successfully.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

}
