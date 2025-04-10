<?php

namespace App\Http\Middleware;

use App\Models\Room;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsRoomOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roomId = $request->route('id');
        $room = Room::findOrFail($roomId);

        if ($room->owner_id != auth()->id()) {
            abort(403, 'Only the room owner can perform this action.');
        }
        
        return $next($request);
    }
}
