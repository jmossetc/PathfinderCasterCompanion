<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Spell;
use App\School;
use App\Classe;


class SpellsController extends Controller
{
    public function all()
    {
        return view('spells', ['spells' => Spell::paginate(20), 'schools' => School::all(), 'classes' => Classe::all()]);
    }

    public function detail($idSpell)
    {
        return view('spell', ['spell' => Spell::find($idSpell)]);
    }

    public function search(Request $request)
    {
        var_dump($request->input('name'));
        $spells = Spell::where('deleted','0')
            ->when(!empty($request->input('school')), function($query) use ($request){
                return $query->whereHas('schools', function($query)  use ($request)
                {
                    $query->where('Schools.id', $request->input('school'));
                });
            })
            ->when(!empty($request->input('class')), function($query) use ($request){
                return $query->whereHas('classes', function($query)  use ($request)
                {
                    $query->where('Classes.id', $request->input('class'));
                });
            })
            ->when(!empty($request->input('name')), function($query) use ($request){
                return $query->whereRaw("LOWER(name) LIKE ?",'%' .strtolower($request->input('name')) . '%');
            });


        /*$spells= Spell::whereHas('schools', function($query)  use ($request)
            {
                $query->where('Schools.id', $request->input('school'));
            })->get();*/

        return view('spells', ['spells' => $spells->get(), 'schools' => School::all(), 'classes' => Classe::all()]);

    }
}
