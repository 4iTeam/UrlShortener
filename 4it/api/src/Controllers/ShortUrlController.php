<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 07-Apr-18
 * Time: 11:53 PM
 */

namespace ForIt\Api\Controllers;


use App\Model\ApiKey;
use App\Model\Link;
use ForIt\Api\Request\ShortUrlRequest as Request;

class ShortUrlController
{
    function short(Request $request){
        $apiKey=ApiKey::findByKey($request['apiKey']);
        $link=Link::create(['url'=>$request['longUrl'],
            'user_id'=>$apiKey->user_id,
            ]);
        if($link){
            return ['id'=>url($link->key)];
        }
    }
}