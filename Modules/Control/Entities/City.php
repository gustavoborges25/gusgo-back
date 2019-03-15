<?php

namespace Modules\Control\Entities;

use App\Uuid;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Uuid;
    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'state_id',
        'ibge_id',
        'name',
    ];

    /**
     * Interação com o relacionamento de State de uma City.
     *
     * @return mixed
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
