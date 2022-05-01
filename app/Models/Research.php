<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event',
        'year',
    ];

    public function lecturerResearch()
    {
        return $this->hasMany(LecturerResearch::class);
    }
}
