<?php

$header_izq = [
    [
        "href" => './compra/menu',
        "name" => "Menu"
    ],
    [
        "href" => './compra/reserva',
        "name" => "Reserva mesa"
    ],
    [
        "href" => './cuenta/perfil',
        "name" => "Perfil"
    ]];

$header_centro = [
    [
        "href" => '/',
        "name" => "Home"
    ]
    ];

$header_der = [
    [
        "href" => './compra/carrito',
        "name" => "Carrito"
    ],
    [
        "href" => './compra/login',
        "name" => "Usuario"
    ]
    ];

$index = [
    [
        "href" => './compra/menu',
        "name" => "Promocion"
    ]
];

$footer = [
    [
        "href" => './institucional/locales',
        "name" => "Locales"
    ],
    [
        "href" => './institucional/servCliente',
        "name" => "Servicio_al_cliente"
    ],
    [
        "href" => './institucional/nosotros',
        "name" => "Sobre_nosotros"
    ],
    [
        "href" => './cuenta/consumo',
        "name" => "Consumos"
    ]
];


$titulo = htmlspecialchars($_GET['nombre'] ?? "PAW");

require 'index.view.php';