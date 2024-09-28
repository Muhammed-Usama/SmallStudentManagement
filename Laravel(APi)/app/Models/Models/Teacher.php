<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    protected $fillable = [
        'id',
        'name_en',
        'name_ar',
        'address_en',
        'address_ar',
        'mobile',
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class, 'teacher_student');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'teacher_course');
    }
    use HasFactory;
}
