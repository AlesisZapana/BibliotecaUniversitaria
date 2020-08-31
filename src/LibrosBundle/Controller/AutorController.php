<?php

namespace LibrosBundle\Controller;

use LibrosBundle\Entity\Autor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Autor controller.
 *
 */
class AutorController extends Controller {
	/**
	 *@IsGranted("ROLE_USER")
	 */
	public function indexAction() {
		$columnas = ['Nombre', 'Apellido', 'Web'];
		$em = $this->getDoctrine()->getManager();

		$autors = $em->getRepository('LibrosBundle:Autor')->findAll();

		return $this->render('@Libros/crud/index.html.twig', array(
			'elementos' => $autors,
			'columnas' => $columnas,
			'atributos' => $columnas,
			'listaNombre' => 'Autores',
			'entidadNombre' => 'Autor',
			'rutaShow' => 'autor_show',
			'rutaEdit' => 'autor_edit',
			'rutaNew' => 'autor_new',
		));
	}

	/**
	 *@IsGranted("ROLE_USER")
	 */
	public function newAction(Request $request) {
		$autor = new Autor();
		$form = $this->createForm('LibrosBundle\Form\AutorType', $autor);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($autor);
			$em->flush();

			$this->addFlash(
				'success',
				'Autor creado'
			);

			return $this->redirectToRoute('autor_index');

			//return $this->redirectToRoute('autor_show', array('id' => $autor->getId()));
		}

		return $this->render('@Libros/crud/new.html.twig', array(
			'autor' => $autor,
			'form' => $form->createView(),
			'entidadNombre' => 'Autor',
			'listaEntidad' => 'Autores',
			'rutaIndex' => 'autor_index',
		));
	}

	/**
	 * Finds and displays a autor entity.
	 *
	 */
	public function showAction(Autor $autor) {
		$columnas = ['Nombre', 'Apellido', 'Biografia'];
		$deleteForm = $this->createDeleteForm($autor);

		return $this->render('@Libros/crud/autor.html.twig', array(
			'elemento' => $autor,
			'delete_form' => $deleteForm->createView(),
			'atributos' => $columnas,
			'columnas' => $columnas,
			'listaNombre' => 'Autores',
			'entidadNombre' => 'Autor',
			'rutaIndex' => 'autor_index',
			'rutaEdit' => 'autor_edit',
		));
	}

	/**
	 *@IsGranted("ROLE_USER")
	 */
	public function editAction(Request $request, Autor $autor) {
		$deleteForm = $this->createDeleteForm($autor);
		$editForm = $this->createForm('LibrosBundle\Form\AutorType', $autor);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('autor_edit', array('id' => $autor->getId()));
		}

		return $this->render('@Libros/crud/edit.html.twig', array(
			'autor' => $autor,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
			'listaNombre' => 'Autores',
			'entidadNombre' => 'Autor',
			'rutaIndex' => 'autor_index',
		));
	}

	/**
	 *@IsGranted("ROLE_USER")
	 */
	public function deleteAction(Request $request, Autor $autor) {
		$form = $this->createDeleteForm($autor);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($autor);
			$em->flush();

			$this->addFlash(
				'danger',
				'Autor eliminado'
			);
		}

		return $this->redirectToRoute('autor_index');
	}

	/**
	 * Creates a form to delete a autor entity.
	 *
	 * @param Autor $autor The autor entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(Autor $autor) {
		return $this->createFormBuilder()
			->setAction($this->generateUrl('autor_delete', array('id' => $autor->getId())))
			->setMethod('DELETE')
			->getForm()
		;
	}
}
