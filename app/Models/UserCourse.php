<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;
    protected $table = 'usercourses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'course_id',
    ];
}
