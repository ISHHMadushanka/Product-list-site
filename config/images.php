<?php

return [

    'driver' => env('IMAGE_DRIVER', 'gd'),
    'upload_path' => env('IMAGE_UPLOAD_PATH', '/uploads'),
    'access_path' => env('IMG__PATH', 'http://127.0.0.1:8000/uploads'),

    1 => ['width' => 35, 'height' => 35],
    2 => ['width' => 480, 'height' => 635],
    3 => ['width' => 1920, 'height' => 760],
    4 => ['width' => 960, 'height' => 960],
    5 => ['width' => 105, 'height' => 140],
];
