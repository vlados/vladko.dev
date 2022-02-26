<?php

namespace App\Models;

use Cog\Contracts\Love\Reacterable\Models\Reacterable as ReacterableInterface;
use Cog\Laravel\Love\Reacterable\Models\Traits\Reacterable;
use Illuminate\Database\Eloquent\Model;

class GuestUser extends Model implements ReacterableInterface
{
    use Reacterable;

    protected $fillable = [
        'session_id',
        'ip',
    ];
}
