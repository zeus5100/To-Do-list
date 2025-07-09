<?php

namespace App\Http\Controllers;

use App\Enums\Priority;
use App\Enums\Status;
use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = auth()->user()
            ->tasks()
            ->filter($request->only(['priority', 'status', 'date_from', 'date_to']))
            ->paginate(10)
            ->withQueryString();

        return view('tasks.index', [
            'tasks' => $tasks,
            'priorities' => Priority::cases(),
            'statuses' => Status::cases(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create', [
            'priorities' => Priority::cases(),
            'statuses' => Status::cases(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskCreateRequest $request)
    {
        auth()->user()->tasks()->create($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Zadanie utworzone.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        return view('tasks.edit', [
            'task' => $task,
            'priorities' => Priority::cases(),
            'statuses' => Status::cases(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskCreateRequest $request, Task $task)
    {
        $this->authorize('update', $task);
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Zadanie zaktualizowane.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Zadanie usunięte.');
    }
}
