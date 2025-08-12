<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolFee extends Model
{
    protected $fillable = ['name','description','amount', 'academic_year_id'];

    //Relationships
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
    public function academic()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
