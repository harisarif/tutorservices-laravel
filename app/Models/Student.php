<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = ['name', 'email'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'tutor_student', 'student_id', 'tutor_id');
    }
     
}
