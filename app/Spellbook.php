<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spellbook extends Model
{
    protected $table = 'Spellbooks';

    //The character of the Spellbook
    public function character()
    {
        return $this->belongsTo('App\Character','id_character');
    }
}
