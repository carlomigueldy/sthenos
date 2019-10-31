<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public $timestamps = false;

    /**
     * A certain role can have 
     * one or many users.
     * 
     * @return void 
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
