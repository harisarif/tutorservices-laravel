<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'school_class_subject');
    }
}
