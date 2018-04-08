<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 07-Apr-18
 * Time: 11:24 PM
 */

namespace ForIt\Base\Services;


class HashIds
{
    protected $hashid;
    function __construct()
    {
        $this->hashid=new \Hashids\Hashids(config('hashids.key'),config('hashids.minLength'));
    }

    function encode($num){
        return $this->hashid->encode($num);
    }
    function decode($hashed){
        return $this->hashid->decode($hashed);
    }
}