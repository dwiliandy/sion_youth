<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
      'preacher',
      'date',
      'family_name',
      'name',
      'time',
      'sector_id',
      'group',
      'description'
    ];
    
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
