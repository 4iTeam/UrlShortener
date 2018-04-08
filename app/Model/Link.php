<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 04-Apr-18
 * Time: 10:59 AM
 */

namespace App\Model;

/**
 * Class Link
 * @package App\Model
 * @property $url
 * @property $key
 * @property $user_id
 * @property $clicks
 * @property $password
 * @property $token
 *
 */
class Link extends Model
{
    protected $fillable=['url','key','clicks','user_id','password','token','meta'];

    function tags(){
        return $this->belongsToMany(Tag::class);
    }
    static function findByKey($key){
        return static::query()->where('key',$key)->first();
    }

}