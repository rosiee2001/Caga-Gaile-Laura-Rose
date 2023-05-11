<?php

namespace App\Models;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListStudents extends Model
{
    use HasFactory;

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'student_id');
    }
    
}