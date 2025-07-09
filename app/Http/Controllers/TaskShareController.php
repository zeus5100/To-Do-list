<?php

namespace App\Http\Controllers;

use App\Models\PublicTaskLink;
use App\Models\Task;
use Illuminate\Support\Str;

class TaskShareController extends Controller
{
    public function store(Task $task)
    {
        $this->authorize('view', $task);

        $token = Str::uuid();
        $expiresAt = now()->addDays(2);

        $token = PublicTaskLink::updateOrCreate(
            ['task_id' => $task->id],
            ['token' => $token, 'expires_at' => $expiresAt]
        )->token;

        return redirect()->back()->with('link', route('tasks.share.show', $token));
    }

    public function show(string $token)
    {
        $link = PublicTaskLink::where('token', $token)
            ->where('expires_at', '>', now())
            ->first();

        if (! $link) {
            return view('tasks.invalid-link');
        }

        return view('tasks.shared', ['task' => $link->task]);
    }
}
