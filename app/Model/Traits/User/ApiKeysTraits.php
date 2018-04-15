<?php
namespace App\Model\Traits\User;
use App\Model\ApiKey;
use App\Model\Observers\ApiKeyObserver;

/**
 * Trait ApiKeysTraits
 * @package App\Model\Traits\User
 * @property $apiKeys
 * @property $keys
 */
trait ApiKeysTraits{
    function api_keys(){
        return $this->hasMany(ApiKey::class);
    }

    /**
     * @param bool $new
     * @return ApiKey
     */
    function generateApiKey($new=false){
        if(!$new && $api=$this->api_keys()->first()){
            return $api;
        }else {
            return $this->api_keys()->create();
        }
    }
    function keys(){
        return $this->hasMany(ApiKey::class);
    }
}