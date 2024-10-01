<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'email'// Add 'name' here
        // Add other fillable attributes if any
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
