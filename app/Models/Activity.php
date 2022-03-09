<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
    ];

    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('created_at', 'desc');
    }
}
