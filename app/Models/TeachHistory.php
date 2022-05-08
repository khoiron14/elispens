<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeachHistory extends Model
{
    use HasFactory;

    const ODD = 'O';
    const EVEN = 'E';

    protected $fillable = [
        'lecturer_id',
        'course_id',
        'semester',
        'year',
    ];

    protected function semesterName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->semester == self::ODD ? 'Ganjil' : 'Genap'
        );
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
