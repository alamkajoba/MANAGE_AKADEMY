<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolFee extends Model
{
    protected $fillable = ['name','description','amount'];

    //Relationships
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
