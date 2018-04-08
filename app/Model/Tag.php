<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 04-Apr-18
 * Time: 11:00 AM
 */

namespace App\Model;


class Tag extends Model
{
    protected $fillable=['name'];
    function links(){
        return $this->belongsToMany(Link::class);
    }
}