<?php
$this->get('/',function(){
    return \Illuminate\Foundation\Inspiring::quote();
});

//$this->get('test','TestController@index');
$this->get('short','ShortUrlController@short')->name('api.short');
$this->post('short','ShortUrlController@short');