<?php
/**
 * Created by PhpStorm.
 * User: alt
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