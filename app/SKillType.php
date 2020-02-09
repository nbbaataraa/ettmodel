<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Model\Skill;
class SKillType extends Model
{
    protected function skills(){
        return $this->belonsToMany(Skill::class);
    }
}
