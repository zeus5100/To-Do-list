<?php

namespace App\Models;

use App\Enums\Priority;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'priority',
        'status',
        'completion_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['priority']) && Priority::tryFrom($filters['priority']), function ($q) use ($filters) {
            $q->where('priority', $filters['priority']);
        })->when(isset($filters['status']) && Status::tryFrom($filters['status']), function ($q) use ($filters) {
            $q->where('status', $filters['status']);
        })->when(!empty($filters['date_from']), function ($q) use ($filters) {
            $q->whereDate('completion_date', '>=', $filters['date_from']);
        })->when(!empty($filters['date_to']), function ($q) use ($filters) {
            $q->whereDate('completion_date', '<=', $filters['date_to']);
        });
    }
}
