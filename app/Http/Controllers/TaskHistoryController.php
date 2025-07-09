<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Task $task)
    {
        $this->authorize('view', $task);

        $history = DB::table('task_versions')
            ->where('task_id', $task->id)
            ->orderByDesc('created_at')
            ->get();

        return view('tasks.history', [
            'task' => $task,
            'history' => $history,
        ]);
    }
}
