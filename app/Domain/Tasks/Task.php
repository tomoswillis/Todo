<?php

namespace App\Domain\Tasks;

use App\Domain\Categories\Category;
use App\Domain\Departments\Department;
use App\Domain\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'category_id',
        'department_id',
        'user_id',
        'description',
        'due_date',
        'progress',
    ];

    // Relationships

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
