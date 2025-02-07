<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
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
}
