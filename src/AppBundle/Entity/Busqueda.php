<?php

namespace AppBundle\Entity;

/**
 * Busqueda
 */
class Busqueda
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $buscar;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set buscar
     *
     * @param string $buscar
     *
     * @return Busqueda
     */
    public function setBuscar($buscar)
    {
        $this->buscar = $buscar;

        return $this;
    }

    /**
     * Get buscar
     *
     * @return string
     */
    public function getBuscar()
    {
        return $this->buscar;
    }
}

