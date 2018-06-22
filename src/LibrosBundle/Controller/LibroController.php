<?php

namespace LibrosBundle\Controller;

use LibrosBundle\Entity\Libro;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Libro controller.
 *
 */
class LibroController extends Controller {
	/**
	 * Lists all libro entities.
	 *
	 */
	public function indexAction() {

		$columnas = ['Titulo', 'ISBN', 'Cantidad Páginas', 'Idioma', 'Num. Edición', 'Año Edicion', 'Editorial', 'Fecha Carga', 'Año Publicación'];
		$atributos = ['Titulo', 'ISBN', 'cantPaginas', 'Idioma', 'NumEdicion', 'AnioEdicion', 'Editorial', 'fechaCarga', 'anioPublicacion'];
		$em = $this->getDoctrine()->getManager();

		$libros = $em->getRepository('LibrosBundle:Libro')->findAll();
		//un método en el repositorio para obtener las categorias.
		return $this->render('@Libros/crud/index.html.twig', array(
			'elementos' => $libros,
			'columnas' => $columnas,
			'listaNombre' => 'Libros',
			'entidadNombre' => 'Libro',
			'atributos' => $atributos,
			'rutaShow' => 'libro_show',
			'rutaEdit' => 'libro_edit',
			'rutaNew' => 'libro_new',
		));
	}

	/**
	 * Creates a new libro entity.
	 *
	 */
	public function newAction(Request $request) {

		$libro = new Libro();
		$form = $this->createForm('LibrosBundle\Form\LibroType', $libro);

		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($libro);
			$em->flush();

			$this->addFlash(
				'success',
				'Libro creado'
			);

			return $this->redirectToRoute('libro_index');

			//return $this->redirectToRoute('libro_show', array('id' => $libro->getId()));
		}

		return $this->render('@Libros/crud/new.html.twig', array(
			'libro' => $libro,
			'form' => $form->createView(),
			'entidadNombre' => 'Libro',
			'listaEntidad' => 'Libros',
			'rutaIndex' => 'libro_index',
		));
	}

	/**
	 * Finds and displays a libro entity.
	 *
	 */
	public function showAction(Libro $libro) {

		$columnas = ['Titulo', 'ISBN', 'Cantidad Páginas', 'Idioma', 'Año Publicación', 'Portada', 'Num. Edición', 'Año Edición', 'Editorial', 'Resumen', 'Descripcion'];
		$atributos = ['Titulo', 'ISBN', 'cantPaginas', 'Idioma', 'anioPublicacion', 'Portada', 'NumEdicion', 'AnioEdicion', 'Editorial', 'Resumen', 'Descripcion'];
		$deleteForm = $this->createDeleteForm($libro);

		return $this->render('@Libros/crud/libro.html.twig', array(
			'elemento' => $libro,
			'delete_form' => $deleteForm->createView(),
			'listaNombre' => 'Libros',
			'entidadNombre' => 'Libro',
			'atributos' => $atributos,
			'columnas' => $columnas,
			'rutaIndex' => 'libro_index',
			'rutaEdit' => 'libro_edit',
		));
	}

	/**
	 * Displays a form to edit an existing libro entity.
	 *
	 */
	public function editAction(Request $request, Libro $libro) {
		$deleteForm = $this->createDeleteForm($libro);
		$editForm = $this->createForm('LibrosBundle\Form\LibroType', $libro);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('libro_edit', array('id' => $libro->getId()));
		}

		return $this->render('@Libros/crud/edit.html.twig', array(
			'libro' => $libro,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
			'listaNombre' => 'Libros',
			'entidadNombre' => 'Libro',
			'rutaIndex' => 'libro_index',
		));
	}

	/**
	 * Deletes a libro entity.
	 *
	 */
	public function deleteAction(Request $request, Libro $libro) {
		$form = $this->createDeleteForm($libro);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($libro);
			$em->flush();

			$this->addFlash(
				'danger',
				'Libro eliminado'
			);

		}

		return $this->redirectToRoute('libro_index');
	}

	/**
	 * Creates a form to delete a libro entity.
	 *
	 * @param Libro $libro The libro entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(Libro $libro) {
		return $this->createFormBuilder()
			->setAction($this->generateUrl('libro_delete', array('id' => $libro->getId())))
			->setMethod('DELETE')
			->getForm()
		;
	}
}
