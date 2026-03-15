<?php

namespace App\Http\Controllers;

use App\Models\Personagem;
use Illuminate\Http\Request;

class MestreController extends Controller
{

public function index(){
$personagem = Personagem::get(['nome', 'hp_atual', 'hp_maximo']);
if(!$personagem){
    $personagem = [];
}
return view('mestre.dashboard', compact('personagem'));
    
}

}
