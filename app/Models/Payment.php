<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['enrollment_id', 'school_fees_id', 'academic_year_id'];

    //RelationShips
    public function academic()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function enrollment()
    {
         return $this->belongsTo(Enrollment::class,);
    }

    public function fees()
    {
        return $this->belongsTo(SchoolFee::class, 'school_fees_id');
    }
}
