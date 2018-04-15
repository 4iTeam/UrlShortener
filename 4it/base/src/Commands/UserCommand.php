<?php
/**
 * Created by PhpStorm.
 * User: alt
 * Date: 15-Apr-18
 * Time: 4:20 PM
 */

namespace ForIt\Base\Commands;


use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class UserCommand extends Command
{
    protected $signature='user {action} {user_id=0} {--name=} {--email=} {--pass=}';
    function handle(){
        $action=$this->argument('action');
        $action=camel_case(str_replace(':','_',$action));
        if(!method_exists($this,$action.'Action')){
            $this->error('Action not found!');
            return ;
        }
        $this->line($action);
        $this->{$action.'Action'}();
    }
    function createAction(){
        $email= $this->option('email');
        $name=$this->option('name');
        if(!$email){
            $this->error('No Email');
            return;
        }
        if(!$name){
            $name=$email;
        }
        $password=$this->option('pass');
        if(!$password){
            $password=str_random();
        }
        $user=User::create(['name'=>$name,'email'=>$email,'password'=>Hash::make($password)]);
        if($user->exists){
            $this->info('User created successfully! id:'.$user->id);
            $this->line('Name: '.$user->name);
            $this->line('Email: '.$user->email);
            $this->line('Password: '.$password);
            $this->line('Api key: '.$user->generateApiKey()->key);
        }else{
            $this->error('Failed to create user');
        }
    }
    function apiGenerateAction($regenerate=false){
        $user=$this->argument('user_id');
        if(!$user=User::find($user)){
            $this->error('User not found');
        }
        if($regenerate){
            $user->api_keys()->delete();
        }
        $this->info('Api key: '.$user->generateApiKey()->key);
    }
    function apiRegenerateAction(){
        return $this->apiGenerateAction(true);
    }
}