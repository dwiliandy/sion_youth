<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sector extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class)->orderBy('date', 'asc');
    }
}
