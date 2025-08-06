<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'middle_name', 
        'last_name', 'gender' , 
        'birth_date', 'birth_town', 
        'class', 'option', 
        'address', 'tutor_name', 
        'phone1', 'phone2',
        'code'
    ];
    protected $casts = [
        'gender' => GenderEnum::class,
    ];
    //RelationShips
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}

