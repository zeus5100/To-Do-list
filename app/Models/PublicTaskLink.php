<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PublicTaskLink extends Model
{
    protected $fillable = [
        'task_id',
        'token',
        'expires_at',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
