<?php

use App\Models\Task;
use App\Notifications\TaskReminderEmail;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    Log::info('Daily task reminder');
    $tomorrow = now()->addDay()->toDateString();
    Task::whereDate('completion_date', $tomorrow)
        ->with('user')
        ->get()
        ->each(fn ($task) => $task->user->notify(new TaskReminderEmail($task)));
})->dailyAt('00:01');
