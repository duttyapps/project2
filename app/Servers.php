<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    protected $table = 'servers';
    protected $fillable = ['name', 'host', 'protocol', 'username', 'password', 'deploy_path', 'test_url'];

    public function deploys()
    {
        return $this->hasMany(Deploys::class);
    }
}
