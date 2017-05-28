<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    //Change table name to match db
    protected $table = 'Spells';

    //The schools of the spell
    public function schools()
    {
        return $this->belongsToMany('App\School','Ass_Spells_School','id_spell','id_school');
    }
}
