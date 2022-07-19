<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'is_complete',
        'todo_group_id',
        'user_id',
    ];

    public function group(){
        return $this->belongsTo(TodoGroup::class,'todo_group_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
