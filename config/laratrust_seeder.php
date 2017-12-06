<?php

return [
    'role_structure' => [
        'cysy' => [
            'users'     => 'c,r,u,d',
            'companies' => 'c,r,u,d',
            'complexes' => 'c,r,u,d',
            'rates'     => 'c,r,u,d',
            'schedules' => 'c,r,u,d',
            'units'     => 'c,r,u,d',
        ],
        'managers' => [
            'users' => 'c,r,u,d',
            'complexes' => 'c,r,u,d',
            'units' => 'c,r,u,d',
            'rates' => 'c,r,u,d',
            'schedules' => 'c,r,u,d',
            'companies' => 'r,u'
        ],
        'owners' => [
            'units' => 'r,u'
        ],
        'travelers' => [
            'units' => 'r',
            'companies' => 'r',
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
