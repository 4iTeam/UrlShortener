<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 06-Apr-18
 * Time: 10:05 AM
 */

namespace App\Model;



use App\User;

/**
 * Class ApiKey
 * @package App\Model
 * @property $name
 * @property $key
 * @property $user_id
 */
class ApiKey extends Model
{
    protected $fillable=['name','key','user_id'];

    function user(){
        return $this->belongsTo(User::class);
    }
    static function findByKey($key){
        return static::query()->where(['key'=>$key])->first();
    }
}