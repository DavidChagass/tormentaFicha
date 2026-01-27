<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    protected $table = 'personagens';
    protected $guarded = [];

    public function magias()
    {
        return $this->hasMany(PersonagemMagia::class, 'personagem_id');
    }
    public function itens()
    {
        return $this->hasMany(PersonagemItem::class, 'personagem_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
