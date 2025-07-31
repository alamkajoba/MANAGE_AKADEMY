<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollments extends Model
{
    protected $fillable = ['student_id', 'level_id', 'academic_id', 'option_id'];

    //RelationShips
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
