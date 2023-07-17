<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name_course',
        'description',
        'start_date',
        'end_date',
    ];
    public function users(){
        return $this->belongsToMany(User::class,'usercourses');
    }

}
