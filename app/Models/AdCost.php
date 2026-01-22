<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdCost extends Model
{
    public $timestamps = false;
    protected $fillable = ['amount','spent_at'];
}