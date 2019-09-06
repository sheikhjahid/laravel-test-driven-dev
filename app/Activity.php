<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function project()
    {
    	return $this->belongsTo('App\Models\Project', 'projet_id');
    }
}
