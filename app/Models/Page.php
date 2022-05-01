<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'name',
        'url',
    ];

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }
}
