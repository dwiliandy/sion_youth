<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
  ];

  public function member_count(){
    return MemberData::where("group", $this->name)->count();
  }
}
