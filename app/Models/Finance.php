<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
     protected $fillable = [
        'description',
        'amount',
        'academic_year_id',
       
    ];
    public function academicYear()
{
    return $this->belongsTo(AcademicYear::class);
}
}
