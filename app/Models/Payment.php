<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['enrollment_id', 'school_fees_id'];

    //RelationShips
    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function fees()
    {
        return $this->belongsTo(SchoolFee::class);
    }
}
