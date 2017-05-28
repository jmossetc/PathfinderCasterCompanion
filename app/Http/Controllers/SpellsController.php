<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spell;

class SpellsListController extends Controller
{
    public function show()
    {
        return view('spells', ['spells' => Spell::all()]);
    }
}
