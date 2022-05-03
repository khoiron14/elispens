<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerResearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'research_id',
        'status'
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
    
    public function research()
    {
        return $this->belongsTo(Research::class);
    }
}
