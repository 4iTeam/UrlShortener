<?php
namespace ForIt\Front\Controllers;

use App\Model\Link;

class RedirectController extends Controller{
    function redirect($key){
        $link=Link::findByKey($key);
        if($link){
            return redirect($link->url);
        }
        abort(404);
    }
}