<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;

    protected $table = 'studentresult';

    protected $fillable = [
        'subject_code',
        'subject_name',
        'subject_mark',
        'subject_grade',
        'academic_session',
        'attendance',
        'classname',
        'overall_marks',
        'result_percentage',
        'result_status',
        'result_comment',
        'student_id',
    ];

    // Define relationships if necessary
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}