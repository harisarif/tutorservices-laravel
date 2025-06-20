<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Tutor extends Model
{
    use HasFactory; use Notifiable;
    protected $fillable = [
        'f_name', 'intro', 'description', 'l_name', 'city',
        'email', 'document', 'dob', 'qualification', 'gender',
        'location', 'experience', 'curriculum', 'teaching', 'phone',
        'video', 'specialization', 'language', 'edu_teaching',
        'status', 'session_id', 'profileImage', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'tutor_student', 'tutor_id', 'student_id');
    }
}
