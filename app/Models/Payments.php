<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['name'];

    //RelationShips
    public function enrollment()
    {
        return $this->hasOne(Enrollments::class);
    }

    public function fees()
    {
        return $this->hasOne(SchoolFees::class);
    }
}
