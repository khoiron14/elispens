<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'study_program_id',
        'nip',
        'address',
        'phone',
        'gender',
        'is_active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function teaches()
    {
        return $this->hasMany(TeachHistory::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function researches()
    {
        return $this->belongsToMany(Research::class)->using(LecturerResearch::class);
    }
}
