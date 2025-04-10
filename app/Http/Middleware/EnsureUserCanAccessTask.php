<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanAccessTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $taskId = $request->route('task'); // Task model-bound or ID
        $userId = auth()->id();

        // Load task with its room and members
        $task = Task::with('room.members')->findOrFail($taskId);
        $room = $task->room;
        $isOwner = $room->owner_id === $userId;
        $isMember = $room->members->contains('user_id', $userId);

        if (!($isOwner || $isMember)) {
            abort(403, 'You are not authorized to access this task.');
        }

        return $next($request);
    }
}
