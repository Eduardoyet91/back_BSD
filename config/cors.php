return [
    'Cors' =>[ 'allowOrigin' => '*',
                'allowMethods' => 
       ['POST'], 'allowHeaders' => 
        ['X-Requested-With','Content-Type','X-CSFR-Token'],
    'exposeHeaders' => [],
    'maxAge' => 0,
    'origin' => true,
        ],
];

 

