<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['faculty_name'];

    //Relationships
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
