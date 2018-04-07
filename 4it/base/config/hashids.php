<?php
return [
    'key'=>env('HASHIDS_KEY',config('app.key')),
    'minLength'=>5,
];