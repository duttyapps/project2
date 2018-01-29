<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stacks extends Model
{
    protected $table = 'stacks';
    protected $fillable = ['name'];

    public function deploys()
    {
        return $this->hasMany(Deploys::class);
    }
}
