<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerResearch extends Model
{
    use HasFactory;

    const PENDING = 0;
    const ACCEPTED = 1;
    const REJECTED = 2;

    protected $fillable = [
        'lecturer_id',
        'research_id',
        'status'
    ];
}
