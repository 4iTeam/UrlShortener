<?php
namespace App\Model\Traits\User;
use App\Model\ApiKey;

trait ApiKeysTraits{
    function apiKeys(){
        return $this->hasMany(ApiKey::class);
    }
    function keys(){
        return $this->hasMany(ApiKey::class);
    }
}