<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'assigned_user_id',
        'status',
        'created_by',
        'due_date',
    ];

    public function assignedUser(){
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
