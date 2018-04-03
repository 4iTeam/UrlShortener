<?php
use Illuminate\Support\Facades\Route;
/**
 * @var $this Route
 */
$this->get('/','IndexController@index')->name('admin.home');