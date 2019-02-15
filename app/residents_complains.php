<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class residents_complains extends Model
{

    public function getResComplainAttribute($value)
    {
    	return ucfirst($value);
    }

/*public function getCommonAttribute($value)
    {
    	return ucfirst($value);
    }*/
}
