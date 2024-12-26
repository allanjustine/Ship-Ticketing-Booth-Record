<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ship()
    {
        return $this->belongsTo('App\Models\Ship');
    }
}
