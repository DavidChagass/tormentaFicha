<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ataques extends Model
{
    protected $table = 'ataques';
    protected $guarded = [];

    public $timestamps = false;

    public function personagem()
    {
        return $this->belongsTo(Personagem::class);
    }
}
