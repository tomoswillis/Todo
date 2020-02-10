<?php

namespace App\Domain\Departments;

use App\Domain\Tasks\Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
    ];

    //Relationships 

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}


