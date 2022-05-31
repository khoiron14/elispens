<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProject extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['student_id','title','field', 'year'];

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class)->using(StudentProject::class);
    }
}
