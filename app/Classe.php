<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'Classes';

    public function spells()
    {
        return $this->belongsToMany('App\Spell','Ass_Spells_Classes','id_class','id_spell')->withPivot('spell_lvl');
    }

    public function Characters()
    {
        return $this->belongsToMany('App\Characters','Ass_Characters_Classes','id_class','id_character')->withPivot('level');
    }

}
