<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AdminController::class, 'login'])->name('login');
Route::get('/', function () {
    return redirect('admin/dashboard');
});

Route::post('admin/con', [AdminController::class, 'con'])->name('con');

Route::middleware(['user_auth'])->group(function () {
    Route::post('/send-notification', [NotificationController::class, 'sendNotification'])->name('notification.send');
    Route::post('/savedevicetoken', [NotificationController::class, 'saveDeviceToken'])->name('tocken.save');




    Route::prefix('/admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    });

    Route::prefix('/student')->group(function () {
        Route::get('index', [StudentController::class, 'index'])->name('student.index');
        Route::get('show/{id}', [StudentController::class, 'show'])->name('student.show');
        Route::get('create', [StudentController::class, 'create'])->name('student.create');
        Route::get('delete/{id}', [StudentController::class, 'delete'])->name('student.delete');
        Route::post('add', [StudentController::class, 'save'])->name('student.save');
        Route::get('edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('update/{id}', [StudentController::class, 'update'])->name('student.update');
    });


    Route::prefix('/teacher')->group(function () {
        Route::get('', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('show/{id}', [TeacherController::class, 'show'])->name('teacher.show');
        Route::get('create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::get('courses', [TeacherController::class, 'courses'])->name('teacher.courses');
        Route::get('grades/{id}', [TeacherController::class, 'grades'])->name('teacher.grades');
        Route::post('grade_continue', [TeacherController::class, 'grades_con'])->name('teacher.grade_continue');
        Route::post('grades_save', [TeacherController::class, 'grades_save'])->name('teacher.grades_save');
        Route::get('delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');
        Route::post('create', [TeacherController::class, 'save'])->name('teacher.save');
        Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::post('update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::post('save_course', [TeacherController::class, 'save_course'])->name('teacher.save_course');
        Route::get('show_course/{course}', [TeacherController::class, 'show_course'])->name('teacher-course.show');
        Route::get('grades_teacher', [TeacherController::class, 'grades_teacher'])->name('teacher.grades_teacher');
    });

    Route::prefix('/course')->group(function () {
        Route::get('', [CourseController::class, 'index'])->name('course.index');
        Route::get('show/{id}', [CourseController::class, 'show'])->name('course.show');
        Route::get('create', [CourseController::class, 'create'])->name('course.create');
        Route::get('delete/{id}', [CourseController::class, 'delete'])->name('course.delete');
        Route::post('create', [CourseController::class, 'save'])->name('course.save');
        Route::get('edit/{id}', [CourseController::class, 'edit'])->name('course.edit');
        Route::post('update/{id}', [CourseController::class, 'update'])->name('course.update');
    });
});
