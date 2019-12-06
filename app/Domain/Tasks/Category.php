<?php

namespace App\Domain\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category',
    ];

    public function tasks()
    {
        return $this->hasMany('\App\Domain\Tasks\Task');
    }
}
