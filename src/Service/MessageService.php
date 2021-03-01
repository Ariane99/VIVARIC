<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

Class MessageService
{
    const TYPE_SUCCESS = "success";
    const TYPE_ERROR = "error";

    /**
     * @var FlashBagInterface
     */
    protected $flashBag;

    /**
     * @param FlashBagInterface $flashBag
     */
    public function __construct(FlashBagInterface $flashBag)
    {
        $this->flashBag = $flashBag;
    }

    /**
     * @param string $message
     * @return mixed
     */
    public function addSuccess(string $message): void
    {
        $this->flashBag->add(self::TYPE_SUCCESS, $message);
    }
        //espera berts, de aca pordiamos hacer consultas, aca no funciona , no pasa esta funcion, me manda ese error que les mande
        //que le mando null o algo asi, pero no se que esta mal, por que en si le pasas la variable del message aca para entrar al constructor
        //del flashbag, pero parece que no le llega nada :'v, so esto no funciona, solo desde el CRUD controller
    // BERTY LOS SERVICIOS SE SUELEN DECLARAR EN SERVICE YAML REO CREO, este vato no lo hizo y le funcino, lo que si vi es que
    //lo usan para los listeners, LO LLAMASTE ARRUBA EN EL CONTROLLER
    
    /**
     * @param string $message
     * @return mixed
     */
    public function addError(string $message): void
    {
        $this->flashBag->add(self::TYPE_ERROR, $message);
    }
}
