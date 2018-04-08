<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 07-Apr-18
 * Time: 11:37 PM
 */

namespace ForIt\Base\Support;


use Illuminate\Support\Facades\Facade;

class HashIds extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ForIt\Base\Services\HashIds::class;
    }
}