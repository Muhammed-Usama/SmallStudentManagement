<?php

namespace App\Models\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'id',
        'email',
        'name_en',
        'name_ar',
        'address_en',
        'address_ar',
        'mobile',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }
    public function teachers()
    {

        return $this->belongsToMany(Teacher::class, 'teacher_student');
    }
    public function grades()
    {
        return $this->belongsToMany(Grade::class, 'grades');
    }
    use HasFactory;
}
