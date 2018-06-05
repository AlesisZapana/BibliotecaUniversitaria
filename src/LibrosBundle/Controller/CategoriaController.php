<?php

namespace LibrosBundle\Controller;

use LibrosBundle\Entity\Categoria;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categorium controller.
 *
 */
class CategoriaController extends Controller {
	/**
	 * Lists all categorium entities.
	 *
	 */
	public function indexAction() {
		$columnas = ['Nombre'];
		$em = $this->getDoctrine()->getManager();

		$categorias = $em->getRepository('LibrosBundle:Categoria')->findAll();

		return $this->render('@Libros/crud/index.html.twig', array(
			'elementos' => $categorias,
			'columnas' => $columnas,
			'atributos' => $columnas,
			'listaNombre' => 'Categorías',
			'entidadNombre' => 'Categoría',
			'rutaShow' => 'categoria_show',
			'rutaEdit' => 'categoria_edit',
			'rutaNew' => 'categoria_new',
		));
	}

	/**
	 * Creates a new categorium entity.
	 *
	 */
	public function newAction(Request $request) {
		$categorium = new Categoria();
		$form = $this->createForm('LibrosBundle\Form\CategoriaType', $categorium);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($categorium);
			$em->flush();

			$this->addFlash(
				'success',
				'Categoria creada'
			);

			return $this->redirectToRoute('categoria_index');

			//return $this->redirectToRoute('categoria_show', array('id' => $categorium->getId()));
		}

		return $this->render('@Libros/crud/new.html.twig', array(
			'categorium' => $categorium,
			'form' => $form->createView(),
			'entidadNombre' => 'Categoria',
			'listaEntidad' => 'Categorias',
			'rutaIndex' => 'categoria_index',
		));
	}

	/**
	 * Finds and displays a categorium entity.
	 *
	 */
	public function showAction(Categoria $categorium) {
		$deleteForm = $this->createDeleteForm($categorium);
		$columnas = ['Nombre'];

		//el categorium pasarlo con un nombre más general
		return $this->render('@Libros/crud/show.html.twig', array(
			'elemento' => $categorium,
			'delete_form' => $deleteForm->createView(),
			'listaNombre' => 'Categorias',
			'entidadNombre' => 'Categoría',
			'atributos' => $columnas,
			'columnas' => $columnas,
			'rutaIndex' => 'categoria_index',
			'rutaEdit' => 'categoria_edit',
		));
	}

	/**
	 * Displays a form to edit an existing categorium entity.
	 *
	 */
	public function editAction(Request $request, Categoria $categorium) {

		$deleteForm = $this->createDeleteForm($categorium);
		$editForm = $this->createForm('LibrosBundle\Form\CategoriaType', $categorium);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('categoria_edit', array('id' => $categorium->getId()));
		}

		return $this->render('@Libros/crud/edit.html.twig', array(
			'categorium' => $categorium,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
			'listaNombre' => 'Categorias',
			'entidadNombre' => 'Categoria',
			'rutaIndex' => 'categoria_index',
		));
	}

	/**
	 * Deletes a categorium entity.
	 *
	 */
	public function deleteAction(Request $request, Categoria $categorium) {
		$form = $this->createDeleteForm($categorium);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($categorium);
			$em->flush();

			$this->addFlash(
				'danger',
				'Libro eliminado'
			);
		}

		return $this->redirectToRoute('categoria_index');
	}

	/**
	 * Creates a form to delete a categorium entity.
	 *
	 * @param Categoria $categorium The categorium entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(Categoria $categorium) {
		return $this->createFormBuilder()
			->setAction($this->generateUrl('categoria_delete', array('id' => $categorium->getId())))
			->setMethod('DELETE')
			->getForm()
		;
	}
}
