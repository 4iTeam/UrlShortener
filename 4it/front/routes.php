<?php
use Illuminate\Support\Facades\Auth;
Auth::routes();

$this->get('/','HomeController@home')->name('home');