<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 07-Apr-18
 * Time: 11:47 PM
 */

namespace App\Model\Observers;


use App\Model\ApiKey;

class ApiKeyObserver
{
    function creating(ApiKey $apiKey){
        if(!$apiKey->user_id){
            $apiKey->user_id=current_user_id();
        }
        $apiKey->key=$this->randomKey();
    }

    protected function randomKey($minLength=40,$maxLength=45, $attempt=3){
        $length=random_int($minLength,$maxLength);
        $key=str_random($length);
        $failed=0;
        while(ApiKey::findByKey($key)){
            if(++$failed>$attempt&& $length<$maxLength){
                $length++;
            }
            $key=str_random($length);

        }
        return $key;
    }
}