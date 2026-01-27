<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonagemMagia extends Model
{
    protected $table = 'personagens_magia';
    protected $guarded = [];
    public $timestamps = false;



     public function personagem()
    {
        return $this->belongsTo(Personagem::class);
    }
}
