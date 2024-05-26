<?php

namespace Paw\Core;

#Para manejar modelos
use Paw\Core\Model;
use Paw\Core\Database\QueryBuilder;

class Controlador
{
    public string $viewsDir; #Direccion a la vista indicada

    #Solo el nombre del modelo (? = significa que es optativo)
    public ?string $modelName = null;
    public array $rutasMenuBurger;
    public array $rutasFooter;
    public array $rutasHeaderDer;
    public array $rutasLogoHeader;

    public function __construct()
    {
        #Obtengo objetos que ya fueron instanciados en un contexto superior al mio
        global $connection, $log;

        $this->viewsDir = __DIR__ . "/../App/views/";


        $this->rutasMenuBurger = [
            /* Menu hamburguesa 0-2*/
            [
                "href" => '../compra/menu',
                "name" => "Menu",
            ],
            [
                "href" => '../compra/reserva',
                "name" => "Reserva mesa",
            ],
            [
                "href" => '../cuenta/perfil',
                "name" => "Perfil"
            ]
        ];
        $this->rutasLogoHeader =
            /*Logo header 3*/
            [
                "href" => '../',
                "name" => "Home",
            ];
        $this->rutasHeaderDer = [
            /*Header parte derecha 4-5*/
            [
                "href" => '../compra/carrito',
                "name" => "carrito",
            ],
            [
                "href" => '../cuenta/login',
                "name" => "usuario"
            ],
        ];
        $this->rutasFooter = [
            /*Footer 6-9*/
            [
                "href" => '../institucional/locales',
                "name" => "Locales"
            ],
            [
                "href" => '../institucional/servCliente',
                "name" => "Servicio al Cliente"
            ],
            [
                "href" => '../institucional/nosotros',
                "name" => "Sobre nosotros"
            ],
            [
                "href" => '../cuenta/consumos',
                "name" => "Consumos"
            ]
        ];

        if (!is_null($this->modelName)) {
            #HAY QUE IMPLEMENTAR EL PATRON SINGLETON EN ESTE CASO
            $qb = new QueryBuilder($connection, $log);
            $model = new $this->modelName;
            $model->setQueryBuilder($qb);
            $this->setModel($model);
        }
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }
    public function getRutasMenuBurger()
    {
        return $this->rutasMenuBurger;
    }

    public function getRutasFooter()
    {
        return $this->rutasFooter;
    }

    public function getRutasHeaderDer()
    {
        return $this->rutasHeaderDer;
    }
    public function getRutasLogoHeader()
    {
        return $this->rutasLogoHeader;
    }
}