<?php

namespace App\Domain\Users;

use App\Domain\Tasks\Task;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
    ];

 public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
