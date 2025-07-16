<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollments extends Model
{
    protected $fillable = ['name'];

    //RelationShips
    // public function student()
    // {
    //     return $this->hasOne(Student::class);
    // }

    // public function classes()
    // {
    //     return $this->hasOne(Classes::class);
    // }

    // public function academic()
    // {
    //     return $this->hasOne(AcademicYear::class);
    // }

    // public function faculty()
    // {
    //     return $this->hasOne(Faculty::class);
    // }
}
