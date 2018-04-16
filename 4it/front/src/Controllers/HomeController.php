<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 16-Apr-18
 * Time: 9:11 PM
 */

namespace ForIt\Front\Controllers;


use App\User;

class HomeController
{
    function home(){
        $apiKey='';
        if(!$user=current_user()){
            if(!$apiKey) {
                $user = User::first();
            }
        }
        if($user){
            $apiKey=$user->generateApiKey()->key;
        }
        return view('front::pages.home',['apiKey'=>$apiKey]);
    }
}