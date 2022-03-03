<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberData extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'birth_date',
      'birth_place',
      'baptize',
      'is_active',
      'sidi',
      'group',
      'family_name',
      'sex',
      'id_number'
    ];
}
