<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $fillable = [
        'activity_id',
        'student_id',
    ];
    
    public function student() //Foreign key
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function activity() //Foreign key
    {
        return $this->belongsTo(ManageActivityEntity::class);
    }
}
