<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @property int $id
 * @property int $user_id
 * @property string $nome
 * @property string $raca
 * @property string $classe
 * @property string|null $divindade
 * @property int $nivel
 * @property int $forca
 * @property int $destreza
 * @property int $constituicao
 * @property int $inteligencia
 * @property int $sabedoria
 * @property int $carisma
 * @property int $hp_atual
 * @property int $hp_maximo
 * @property int $mp_atual
 * @property int $mp_maximo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PersonagemItem> $itens
 * @property-read int|null $itens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PersonagemMagia> $magias
 * @property-read int|null $magias_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereCarisma($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereClasse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereConstituicao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereDestreza($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereDivindade($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereForca($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereHpAtual($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereHpMaximo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereInteligencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereMpAtual($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereMpMaximo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereNivel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereRaca($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereSabedoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Personagem whereUserId($value)
 */
	class Personagem extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemItem query()
 */
	class PersonagemItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $personagem_id
 * @property string $nome
 * @property int $circulo
 * @property string $escola
 * @property string $execucao
 * @property string $alcance
 * @property string $alvo
 * @property string $duracao
 * @property string|null $resistencia
 * @property string $descricao
 * @property-read \App\Models\Personagem $personagem
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereAlcance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereAlvo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereCirculo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereDuracao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereEscola($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereExecucao($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia wherePersonagemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonagemMagia whereResistencia($value)
 */
	class PersonagemMagia extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

