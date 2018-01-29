<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Deploys extends Model
{
    use Notifiable;

    protected $table = 'deploys';

    public function stacks()
    {
        return $this->belongsTo(Stacks::class, 'stack_id', 'id');
    }

    public function servers()
    {
        return $this->belongsTo(Servers::class, 'server_id', 'id');
    }

    public function routeNotificationForSlack()
    {
        return 'https://hooks.slack.com/services/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';
    }
}
