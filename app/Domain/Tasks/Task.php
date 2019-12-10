<?php

namespace App\Domain\Tasks;

use App\Domain\Categories\Category;
use App\Domain\Departments\Department;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'category_id',
        'department_id',
        'description',
        'due_date',
        'completed',
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

}

