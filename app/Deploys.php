<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deploys extends Model
{
    protected $table = 'deploys';

    public function stacks() {
        return $this->belongsTo(Stacks::class, 'stack_id', 'id');
    }

    public function servers() {
        return $this->belongsTo(Servers::class, 'server_id', 'id');
    }
}
