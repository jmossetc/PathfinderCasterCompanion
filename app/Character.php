<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'Characters';


    //The user of the character
    public function user()
    {
        return $this->belongsTo('App\User','id_user');
    }

    //The classes of the character
    public function classes()
    {
        return $this->belongsToMany('App\Classe','Ass_Characters_Classes','id_character','id_class')->withPivot('level');
    }

    //The spellbooks of tje character
    public function spellbooks()
    {
        return $this->hasMany('App\Spellbook','id_character');
    }

}
