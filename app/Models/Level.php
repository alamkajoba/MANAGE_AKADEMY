<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['class_name'];

    //RelationShip
    public function enrollments()
    {
        return $this->hasMany(Enrollments::class);
    }
}
