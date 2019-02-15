<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    
    public function complain()
    {

    	return $this->hasMany('\App\residents_complains');
    }
}
