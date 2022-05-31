<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'subject',
        'publisher',
        'date',
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
