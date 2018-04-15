<?php

namespace App;

use App\Model\Traits\User\ApiKeysTraits;
use App\Model\Traits\User\RolePermissionTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @property $id
 * @property $name
 * @property $email
 * @property $password
 * @method static static find($id,$columns = ['*'])
 * @method static static create($attributes=[])
 */
class User extends Authenticatable
{
    use Notifiable;
    use ApiKeysTraits;
    use RolePermissionTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
