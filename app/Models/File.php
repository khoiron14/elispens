<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'fileable_id',
        'fileable_type'
    ];

    public function fileable() 
    {
        return $this->morphTo();
    }

    /**
     * Get the file's url.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('storage/' . $value),
        );
    }
}