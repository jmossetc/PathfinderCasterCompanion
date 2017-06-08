<?php

namespace App\Http\Controllers;

use App\Spell;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Spellbook;
use App\Character;

class SpellbooksController extends Controller
{
    public function characterSpellbooks(Request $request)
    {

        if (Auth::check()) {
            $character = Character::find($request->id);
            return view('spellbooks.spellbooks', ['spellbooks' => $character->spellbooks]);
        } else {
            return view('auth.login');
        }


    }

    public function spellbook(Request $request)
    {

        if (Auth::check()) {
            $user = Auth::user();
        } else {
            return view('auth.login');
        }

        $isUserSpellbook = 0;
        $spellbook = Spellbook::find($request->id);

        //Verifying if this is the user character
        foreach ($user->characters as $charItered) {
            if ($charItered->id == $spellbook->id){
                $isUserSpellbook = 1;
            }
        }

        if($isUserSpellbook == 1 || $spellbook->isPublic){
            return view('spellbooks.spellbook', ['spellbook' => $spellbook, 'isUserSpellbook'=> $isUserSpellbook]);
        }
        else {
            return view('welcome');
        }



    }


    public function create(){

        if (Auth::check()) {
            return view('spellbooks.create');
        } else {
            return view('auth.login');
        }
    }

    public function save(Request $request){
        if (Auth::check()) {
            $spellbook = new Spellbook();
            $spellbook->name = $request->name;
            $spellbook->description = $request->description;
            $spellbook->price = 0;
            $spellbook->language = $request->language;
            $spellbook->is_public = $request->isPublic;
            $spellbook->id_character = 1;

            $spellbook->save();

            return redirect()->route("spellbook", $spellbook->id)->with('message','Spellbook created!');
        } else {
            return view('auth.login');
        }


    }



}
