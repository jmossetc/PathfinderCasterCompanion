<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spell;

class SpellsController extends Controller
{
    public function spellList()
    {
        return view('spells', ['spells' => Spell::all()]);
    }

    public function detail($idSpell)
    {
        return view('spell', ['spell' => Spell::find($idSpell)]);
    }
}
