<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table = 'exercises';
    public $timestamps = false;
    protected $fillable = [
        
        'assignment_id',
        'student_name',
        'time_send',
        'filepath',
        'filename',
    ];

}
