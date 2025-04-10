<?php

namespace App\Http\Middleware;

use App\Models\Room;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsRoomMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roomId = $request->route('roomId');
        $userId = 1;

        $room = Room::IsMember($userId)->find($roomId);
        if (!$room) {
            abort(403, 'You are not authorized to access this room.');
        }

        return $next($request);

    }
}
