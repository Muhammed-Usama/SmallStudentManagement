<?php

namespace App\Models;

use App\Models\Models\Course;
use App\Models\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;
class Grade extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'course_id', 'grade'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'grades');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'grades');
    }
}
