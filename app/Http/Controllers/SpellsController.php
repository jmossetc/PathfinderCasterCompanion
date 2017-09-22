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
        return view('spells.spells', ['spells' => Spell::paginate(20), 'schools' => School::all(), 'classes' => Classe::all()]);
    }

    public function detail($idSpell)
    {
        return view('spells.spell', ['spell' => Spell::find($idSpell)]);
    }

    public function search(Request $request)
    {


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
            })
            ->when($request->input('verbalComponent') != null, function($query) use ($request){
                return $query->where("verbal", $request->input('verbalComponent'));
            })
            ->when($request->input('somaticComponent') != null, function($query) use ($request){
                return $query->where("somatic", $request->input('somaticComponent'));


            })
            ->when($request->input('materialComponent') != null, function($query) use ($request){
                return $query->where("material", $request->input('materialComponent'));
            })
            ->when(!empty($request->input('level')), function($query) use ($request){
                return $query->whereHas('classes', function($query)  use ($request)
                {
                    return $query->where('Ass_Spells_Classes.spell_lvl','=', $request->input('level'));
                });

            })
            ->when(!empty($request->input('castingTime')), function($query) use ($request){

                return $query->whereRaw("LOWER(casting_time) LIKE ?",'%' . strtolower($request->input('castingTime')) . '%');

            });
        /*var_dump($request->input());
        var_dump($spells->toSQL());*/



        return view('spells.table', ['spells' => $spells->paginate(20), 'schools' => School::all(), 'classes' => Classe::all()]);

    }
}
