<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 07-Apr-18
 * Time: 11:18 PM
 */

namespace App\Model\Observers;


use App\Model\Link;
use ForIt\Base\Support\HashIds;

class LinkObserver
{
    function creating(Link $link){
        if(!$link->user_id){
            $link->user_id=current_user_id();
        }
        if(!$link->user_id){
            $link->user_id=null;
        }
    }
    function created(Link $link){
        if(!$link->key){
            $link->key=HashIds::encode($link->getKey());
        }
        $link->save();
    }
}