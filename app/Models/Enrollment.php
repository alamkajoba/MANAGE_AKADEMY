<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['student_id', 'level_id', 'option_id', 'academic_year_id'];

    //RelationShips
    public function academic()
    {
        return $this->belongsTo(AcademicYear::class);
    }
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
    public function payments()
    {
    return $this->hasMany(Payment::class, 'enrollment_id');
    }

}
