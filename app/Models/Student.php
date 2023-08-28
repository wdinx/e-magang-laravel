<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'name',
        'username',
        'password',
        'gender',
        'start_date',
        'end_date',
        'isActive'
        
    ];

    public function school(){
        return $this->belongsTo(School::class,'school_id');
    }
}
