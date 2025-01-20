<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class catagory extends Model
{
    protected $fillable = ['name', 'description'];
    public function projects()
    {
        return $this->hasMany('App\Models\project');
    }
}
