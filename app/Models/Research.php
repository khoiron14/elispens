<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'researches';

    protected $fillable = [
        'title',
        'event',
        'year',
    ];

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class)->using(LecturerResearch::class);
    }
}
