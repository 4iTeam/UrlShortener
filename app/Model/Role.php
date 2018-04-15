<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 04-Apr-18
 * Time: 11:06 AM
 */

namespace App\Model;


use App\User;
use Illuminate\Support\Collection;

/**
 * Class Role
 * @package App\Model
 * @property $name
 * @property $caps
 * @property User[] $users
 */
class Role extends Model {
    protected $fillable=['name','caps'];
    public $timestamps=false;
    function hasAllCaps(){
        return !empty($this->caps['_all_caps']);
    }
    function getCaps(){
        return array_keys($this->caps);
    }
    function setCapsAttribute($value){
        if(is_array($value)){
            $value=array_map(function($v){
                return str_slug($v,'_');
            },$value);
        }else{
            $value=[str_slug($value,'_')];
        }
        $this->attributes['caps']=serialize($value);
    }
    function getCapsAttribute($value){
        return unserialize($value);
    }

    function users(){
        return $this->hasMany(User::class);
    }

    /**
     * @param $name
     *
     * @return static
     */
    public static function findByName($name){
        return static::where('name',$name)->first();
    }
}