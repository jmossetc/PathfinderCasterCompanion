<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Classe;
use App\School;

class CharactersController extends Controller
{
    public function characters()
    {

        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return view('welcome');
        }
        $characters = $user->characters;

        return view('characters.characters', ['characters' => $characters]);
    }

    public function character(Request $request)
    {



        $isUserChar = 0;
        $character = Character::find($request->id);
        $user = Auth::user();

        foreach ($user->characters as $characterItered) {
            if ($characterItered->id == $request->id){
                $isUserChar = 1;
            }
        }

        if($isUserChar == 1 || $character->isPublic){
            return view('characters.character', ['character' => $character, 'isUserChar'=> $isUserChar]);
        }
        else {
            return view('welcome');
        }



    }


    public function create(){
        return view('characters.create', ['schools' => School::all(), 'classes' => Classe::all()]);
    }
    public function save(Request $request){


        $character = new Character;
        $character->name = $request->name;
        $character->description = $request->description;
        $character->id_user = Auth::id();
        $character->level = $request->level;



        $character->save();

        $character->classes()->attach($request->class, ['level' => $request->level]);


        return redirect()->route("character", $character->id)->with('message','Character created');
    }

}