<?php

namespace LibrosBundle\Entity;

/**
 * Libro
 */
class Libro {
	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $titulo;

	/**
	 * @var int
	 */
	private $isbn;

	/**
	 * @var int
	 */
	private $cantpaginas;

	/**
	 * @var string
	 */
	private $portada;

	/**
	 * @var \DateTime
	 */
	private $fechaCarga;

	/**
	 * @var string
	 */
	private $editorial;

	/**
	 * @var string
	 */
	private $descripcion;

	/**
	 * @var \LibrosBundle\Entity\Idioma
	 */
	private $idioma;

	/**
	 * @var integer
	 */
	private $numEdicion;

	/**
	 * @var integer
	 */
	private $anioEdicion;
	/**
	 * @var \LibrosBundle\Entity\Categoria
	 */
	//debería decir categorias
	private $categoria;

	/**
	 * @var \LibrosBundle\Entity\Autor
	 */

	private $autor;

	/**
	 * @var string
	 */
	private $resumen;

	/**
	 * @var integer
	 */
	private $anioPublicacion;

	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set titulo
	 *
	 * @param string $titulo
	 *
	 * @return Libro
	 */
	public function setTitulo($titulo) {
		$this->titulo = $titulo;

		return $this;
	}

	/**
	 * Get titulo
	 *
	 * @return string
	 */
	public function getTitulo() {
		return $this->titulo;
	}

	/**
	 * Set isbn
	 *
	 * @param integer $isbn
	 *
	 * @return Libro
	 */
	public function setIsbn($isbn) {
		$this->isbn = $isbn;

		return $this;
	}

	/**
	 * Get isbn
	 *
	 * @return int
	 */
	public function getIsbn() {
		return $this->isbn;
	}

	/**
	 * Set cantpaginas
	 *
	 * @param integer $cantpaginas
	 *
	 * @return Libro
	 */
	public function setCantpaginas($cantpaginas) {
		$this->cantpaginas = $cantpaginas;

		return $this;
	}

	/**
	 * Get cantpaginas
	 *
	 * @return int
	 */
	public function getCantpaginas() {
		return $this->cantpaginas;
	}

	/**
	 * Set portada
	 *
	 * @param string $portada
	 *
	 * @return Libro
	 */
	public function setPortada($portada) {
		$this->portada = $portada;

		return $this;
	}

	/**
	 * Get portada
	 *
	 * @return string
	 */
	public function getPortada() {
		return $this->portada;
	}

	/**
	 * Set editorial
	 *
	 * @param string $editorial
	 *
	 * @return Libro
	 */
	public function setEditorial($editorial) {
		$this->editorial = $editorial;

		return $this;
	}

	/**
	 * Get editorial
	 *
	 * @return string
	 */
	public function getEditorial() {
		return $this->editorial;
	}

	/**
	 * Set descripcion
	 *
	 * @param string $descripcion
	 *
	 * @return Libro
	 */
	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;

		return $this;
	}

	/**
	 * Get descripcion
	 *
	 * @return string
	 */
	public function getDescripcion() {
		return $this->descripcion;
	}

	/**
	 * Set idioma
	 *
	 * @param \LibrosBundle\Entity\Idioma $idioma
	 *
	 * @return Libro
	 */
	public function setIdioma(\LibrosBundle\Entity\Idioma $idioma = null) {
		$this->idioma = $idioma;

		return $this;
	}

	/**
	 * Get idioma
	 *
	 * @return \LibrosBundle\Entity\Idioma
	 */
	public function getIdioma() {
		return $this->idioma;
	}
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->categoria = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Add categorium
	 *
	 * @param \LibrosBundle\Entity\Categoria $categorium
	 *
	 * @return Libro
	 */
	public function addCategorium(\LibrosBundle\Entity\Categoria $categorium) {
		$this->categoria[] = $categorium;

		return $this;
	}

	/**
	 * Remove categorium
	 *
	 * @param \LibrosBundle\Entity\Categoria $categorium
	 */
	public function removeCategorium(\LibrosBundle\Entity\Categoria $categorium) {
		$this->categoria->removeElement($categorium);
	}

	/**
	 * Get categoria
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCategoria() {
		return $this->categoria;
	}

	/**
	 * Add autor
	 *
	 * @param \LibrosBundle\Entity\Autor $autor
	 *
	 * @return Libro
	 */
	public function addAutor(\LibrosBundle\Entity\Autor $autor) {
		$this->autor[] = $autor;

		return $this;
	}

	/**
	 * Remove autor
	 *
	 * @param \LibrosBundle\Entity\Autor $autor
	 */
	public function removeAutor(\LibrosBundle\Entity\Autor $autor) {
		$this->autor->removeElement($autor);
	}

	/**
	 * Get autor
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getAutor() {
		return $this->autor;
	}

	/**
	 * Set anioEdicion
	 *
	 * @param \DateTime $anioEdicion
	 *
	 * @return Libro
	 */

	/**
	 * Set fechaCarga
	 *
	 * @param \DateTime $fechaCarga
	 *
	 * @return Libro
	 */
	public function setFechaCarga($fechaCarga) {
		$this->fechaCarga = $fechaCarga;

		return $this;
	}

	/**
	 * Get fechaCarga
	 *
	 * @return \DateTime
	 */
	public function getFechaCarga() {
		return $this->fechaCarga;
	}

	/**
	 * Set numEdicion
	 *
	 * @param integer $numEdicion
	 *
	 * @return Libro
	 */
	public function setNumEdicion($numEdicion) {
		$this->numEdicion = $numEdicion;

		return $this;
	}

	/**
	 * Get numEdicion
	 *
	 * @return integer
	 */
	public function getNumEdicion() {
		return $this->numEdicion;
	}

	/**
	 * Set anioEdicion
	 *
	 * @param integer $anioEdicion
	 *
	 * @return Libro
	 */
	public function setAnioEdicion($anioEdicion) {
		$this->anioEdicion = $anioEdicion;

		return $this;
	}

	/**
	 * Get anioEdicion
	 *
	 * @return integer
	 */
	public function getAnioEdicion() {
		return $this->anioEdicion;
	}

	/**
	 * Set resumen
	 *
	 * @param string $resumen
	 *
	 * @return Libro
	 */
	public function setResumen($resumen) {
		$this->resumen = $resumen;

		return $this;
	}

	/**
	 * Get resumen
	 *
	 * @return string
	 */
	public function getResumen() {
		return $this->resumen;
	}

	/**
	 * Set anioPublicacion
	 *
	 * @param integer $anioPublicacion
	 *
	 * @return Libro
	 */
	public function setAnioPublicacion($anioPublicacion) {
		$this->anioPublicacion = $anioPublicacion;

		return $this;
	}

	/**
	 * Get anioPublicacion
	 *
	 * @return integer
	 */
	public function getAnioPublicacion() {
		return $this->anioPublicacion;
	}

	public function __toString() {
		return $this->getTitulo();
	}
}
