<?php

namespace LibrosBundle\Entity;

/**
 * Autor
 */
class Autor {
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $nombre;

	/**
	 * @var string
	 */
	private $apellido;

	/**
	 * @var string
	 */
	private $biografia;

	/**
	 * @var string
	 */
	private $web;

	/**
	 * @var string
	 */
	private $foto;

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
	 * @return Autor
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
	 * Set apellido
	 *
	 * @param string $apellido
	 *
	 * @return Autor
	 */
	public function setApellido($apellido) {
		$this->apellido = $apellido;

		return $this;
	}

	/**
	 * Get apellido
	 *
	 * @return string
	 */
	public function getApellido() {
		return $this->apellido;
	}

	/**
	 * Set biografia
	 *
	 * @param string $biografia
	 *
	 * @return Autor
	 */
	public function setBiografia($biografia) {
		$this->biografia = $biografia;

		return $this;
	}

	/**
	 * Get biografia
	 *
	 * @return string
	 */
	public function getBiografia() {
		return $this->biografia;
	}

	/**
	 * Set web
	 *
	 * @param string $web
	 *
	 * @return Autor
	 */
	public function setWeb($web) {
		$this->web = $web;

		return $this;
	}

	/**
	 * Get web
	 *
	 * @return string
	 */
	public function getWeb() {
		return $this->web;
	}

	/**
	 * Set foto
	 *
	 * @param string $foto
	 *
	 * @return Autor
	 */
	public function setFoto($foto) {
		$this->foto = $foto;

		return $this;
	}

	/**
	 * Get foto
	 *
	 * @return string
	 */
	public function getFoto() {
		return $this->foto;
	}

	public function getNombreCompleto() {
		return $this->apellido . ' ' . $this->nombre;
	}

	public function __toString() {
		return $this->apellido . ' ' . $this->nombre;
	}

}
