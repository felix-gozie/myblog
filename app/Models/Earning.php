<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    public $timestamps = false;
    protected $fillable = ['post_id','amount','earned_at'];
}
