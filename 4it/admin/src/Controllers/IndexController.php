<?php
/**
 * Created by PhpStorm.
 * User: 4iTeam
 * Date: 03-Apr-18
 * Time: 12:05 PM
 */

namespace ForIt\Admin\Controllers;


class IndexController extends Controller
{
    function index(){
        return view('admin::home');
    }
}