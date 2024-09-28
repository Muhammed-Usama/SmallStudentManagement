<?php

namespace App\Models\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;
class Course extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_course');
    }
    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'grades');
    }
    use HasFactory;
}
