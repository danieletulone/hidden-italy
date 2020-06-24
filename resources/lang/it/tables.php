<?php

return [

    'users' => [
        'id' => 'Id',
        'firstname' => 'Nome',
        'lastname' => 'Cognome',
        'email' => 'email',
        'email_verified_at' => 'Email verificata il',
        'role_id' => 'Id Ruolo',
        'created_at' => 'Creato il',
        'updated_at' => 'Aggiornato il',
    ],
    'scopes' => [
        'id' => 'Id',
        'name' => 'Nome',
        'description' => 'Descrizione',
    ],
    'roles' => [
        'id' => 'Id',
        'name' => 'Nome',
        'scopes' => 'Permessi',
        'created_at' => 'Creato il',
        'updated_at' => 'Aggiornato il',
    ], 
    'cateogries' => [
        'id' => 'Id',
        'description' => 'Descrizione',
    ]
];