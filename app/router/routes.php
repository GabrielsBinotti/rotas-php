<?php

return [
    "GET" => [
        "/rotas/" => "Home@index",
        "/rotas/user/[0-9]+" => "User@update",
    ]
];