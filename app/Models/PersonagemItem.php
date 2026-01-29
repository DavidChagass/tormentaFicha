<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonagemItem extends Model
{
    protected $table = 'personagens_itens';
    protected $guarded = [];
    
    public $timestamps = false;


    public function personagem()
    {
        return $this->belongsTo(Personagem::class);
    }
}
