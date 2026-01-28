<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  @mixin \Illuminate\Database\Eloquent\Builder
 */

class Personagem extends Model
{
    protected $table = 'personagens';
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'nome',
        'raca',
        'classe',
        'divindade',
        'nivel',
        //atributos
        'forca',
        'destreza',
        'constituicao',
        'inteligencia',
        'sabedoria',
        'carisma',
        //status
        'hp_atual',
        'hp_maximo',
        'mp_atual',
        'mp_maximo',
    ];

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
