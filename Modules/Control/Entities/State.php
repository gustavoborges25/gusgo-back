<?php

namespace Modules\Control\Entities;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use Uuids;

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'ibge_id',
        'initials',
        'name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'state_id');
    }
}
