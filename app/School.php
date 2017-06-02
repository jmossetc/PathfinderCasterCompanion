<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'Schools';

    public function spells()
    {
        return $this->belongsToMany('App\Spell','Ass_Spells_School','id_school','id_spell');
    }

    public function classes()
    {
        return $this->belongsToMany('App\Spell','Ass_Spells_Classes','id_class','id_spell');
    }
}
