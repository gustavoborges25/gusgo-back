<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Uuids;

class User extends Authenticatable
{
    use Uuid, Notifiable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'telephone',
        'situation',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public static function getUserByEmail($email)
    {
        $user = User
            ::all()
            ->filter(function ($user) use ($email) {
                if (decrypt($user->email) == $email) {
                    return $user;
                }
            });

        return $user->first();
    }
}
