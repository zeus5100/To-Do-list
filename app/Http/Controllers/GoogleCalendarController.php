<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Spatie\GoogleCalendar\Event;

class GoogleCalendarController extends Controller
{
    public function addToCalendar(Task $task)
    {
        if (!Storage::disk('local')->exists('google-calendar/oauth-token.json')) {
            return redirect('/google-calendar/auth');
        }
        $event = new Event;
        $event->name = $task->name;
        $event->startDate = Carbon::parse($task->completion_date);
        $event->endDate = Carbon::parse($task->completion_date);
        $event->save();

        return back()->with('success', 'Zadanie dodane do Google Calendar');
    }
}
