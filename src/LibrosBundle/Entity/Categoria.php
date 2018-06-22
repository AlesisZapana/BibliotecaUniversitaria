<?php

namespace LibrosBundle\Entity;

/**
 * Categoria
 */
class Categoria {
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $nombre;

	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set nombre
	 *
	 * @param string $nombre
	 *
	 * @return Categoria
	 */
	public function setNombre($nombre) {
		$this->nombre = $nombre;

		return $this;
	}

	/**
	 * Get nombre
	 *
	 * @return string
	 */
	public function getNombre() {
		return $this->nombre;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->libros = new \Doctrine\Common\Collections\ArrayCollection();
	}

	public function __toString() {
		return $this->getNombre();
	}
}
