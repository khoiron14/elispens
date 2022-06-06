<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProject extends Model
{
    use HasFactory;

    const PENDING = 0;
    const ACCEPTED = 1;
    const REJECTED = 2;

    protected $fillable = [
        'lecturer_id',
        'final_project_id',
        'status'
    ];
}
