<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 06-Apr-18
 * Time: 9:14 AM
 */

namespace ForIt\Api\Controllers;


use App\Model\Link;
use App\Model\Role;
use App\Model\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TestController
{
    function index(){
        //Role::create(['name'=>1]);
        //$user=User::create(['name'=>'alt','email'=>'anc','password'=>str_random(),'role_id'=>1]);
        //$user=User::find(1);
        //$user->generateApiKey();
        //return $user->api_keys;
        //return [];
    }
}