<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 04-Apr-18
 * Time: 11:06 AM
 */

namespace App\Model;


class Role extends Model
{
    protected $fillable=['name','caps'];
    public $timestamps=false;
}