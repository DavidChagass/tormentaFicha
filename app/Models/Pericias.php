<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pericias extends Model
{
    protected $table = 'pericias';
    protected $guarded = [];

    public $timestamps = false;

     protected $casts = [
        'treinado' => 'boolean',
    ];

    public function personagem()
    {
        return $this->belongsTo(Personagem::class);
    }
}
