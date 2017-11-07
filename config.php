<?php

return [
    'database' => [
        'connection' => 'mysql:host=localhost',
        'name'       => 'todo',
        'username'   => 'root',
        'password'   => '',
        'options'    => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];