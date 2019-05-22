<?php

return [
    'name'=>'Laravel 学院',
    'title'=>'My Blog',
    'subtitle'=>"http://blog51.test",
    'description'=>"Laravel学院致力于提供优质L",
    'author'=>'学院君',
    'page_image'=>'upload/home-bg.jpg',
    'posts_per_page'=>10,
    'uploads' => [
        'storage' => 'public',
        'webpath' => '/storage',
    ],
    'contact_email'=>env('MAIL_FROM'),
    
];