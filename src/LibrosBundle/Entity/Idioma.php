<?php

namespace LibrosBundle\Entity;

/**
 * Idioma
 */
class Idioma {
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $nombre;

	/**
	 *
	 */
	private $libros;

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
	 * @return Idioma
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

	/**
	 * Add libro
	 *
	 * @param \LibrosBundle\Entity\Libro $libro
	 *
	 * @return Idioma
	 */
	public function addLibro(\LibrosBundle\Entity\Libro $libro) {
		$this->libros[] = $libro;

		return $this;
	}

	/**
	 * Remove libro
	 *
	 * @param \LibrosBundle\Entity\Libro $libro
	 */
	public function removeLibro(\LibrosBundle\Entity\Libro $libro) {
		$this->libros->removeElement($libro);
	}

	/**
	 * Get libros
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getLibros() {
		return $this->libros;
	}

	public function __toString() {
		return $this->getNombre();
	}
}
