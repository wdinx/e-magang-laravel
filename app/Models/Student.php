<?php

namespace App\Models;

use App\Models\School;
use App\Models\Attendance;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function school(){
        return $this->belongsTo(School::class,'school_id');
    }

    public function attendance(){
        return $this->hasMany(Attendance::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
