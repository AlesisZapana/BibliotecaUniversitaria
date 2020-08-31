<?php

namespace LibrosBundle\Controller;

use LibrosBundle\Entity\Idioma;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
/**
 *@IsGranted("ROLE_USER")
 */
class IdiomaController extends Controller {
	/**
	 * Lists all idioma entities.
	 *
	 */
	public function indexAction() {
		$columnas = ['Nombre'];
		$em = $this->getDoctrine()->getManager();

		$idiomas = $em->getRepository('LibrosBundle:Idioma')->findAll();

		return $this->render('@Libros/crud/indexaux.html.twig', array(
			'elementos' => $idiomas,
			'columnas' => $columnas,
			'listaNombre' => 'Idiomas',
			'entidadNombre' => 'Idioma',
			'atributos' => $columnas,
			'rutaShow' => 'idioma_show',
			'rutaEdit' => 'idioma_edit',
			'rutaNew' => 'idioma_new',
		));
	}

	/**
	 * Creates a new idioma entity.
	 *
	 */
	public function newAction(Request $request) {

		$idioma = new Idioma();
		$form = $this->createForm('LibrosBundle\Form\IdiomaType', $idioma);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($idioma);
			$em->flush();

			$this->addFlash(
				'success',
				'Idioma creado'
			);

			return $this->redirectToRoute('idioma_index');

			//return $this->redirectToRoute('idioma_show', array('id' => $idioma->getId()));
		}

		return $this->render('@Libros/crud/new.html.twig', array(
			'idioma' => $idioma,
			'form' => $form->createView(),
			'rutaIndex' => 'idioma_index',
			'entidadNombre' => 'Idioma',
			'listaEntidad' => 'Idiomas',
		));
	}

	/**
	 * Finds and displays a idioma entity.
	 *
	 */
	public function showAction(Idioma $idioma) {

		$columnas = ['Nombre'];

		$deleteForm = $this->createDeleteForm($idioma);

		return $this->render('@Libros/crud/show.html.twig', array(
			'elemento' => $idioma,
			'delete_form' => $deleteForm->createView(),
			'listaNombre' => 'Idiomas',
			'entidadNombre' => 'Idioma',
			'atributos' => $columnas,
			'columnas' => $columnas,
			'rutaIndex' => 'idioma_index',
			'rutaEdit' => 'idioma_edit',
		));
	}

	/**
	 * Displays a form to edit an existing idioma entity.
	 *
	 */
	public function editAction(Request $request, Idioma $idioma) {

		$deleteForm = $this->createDeleteForm($idioma);
		$editForm = $this->createForm('LibrosBundle\Form\IdiomaType', $idioma);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('idioma_index');
		}

		return $this->render('@Libros/crud/edit.html.twig', array(
			'idioma' => $idioma,
			'edit_form' => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
			'listaNombre' => 'Idiomas',
			'entidadNombre' => 'Idioma',
			'rutaIndex' => 'idioma_index',
		));
	}

	/**
	 * Deletes a idioma entity.
	 *
	 */
	public function deleteAction(Request $request, Idioma $idioma) {
		$form = $this->createDeleteForm($idioma);
		$form->handleRequest($request);

		try {

			if ($form->isSubmitted() && $form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->remove($idioma);
				$em->flush();

				$this->addFlash(
					'danger',
					'Idioma eliminado'
				);

				return $this->redirectToRoute('idioma_index');
			}

		} catch (\Exception $e) {
			$this->addFlash(
				'danger',
				'No se puede eliminar idioma'
			);
			return $this->redirectToRoute('idioma_index');
		}
	}

	/**
	 * Creates a form to delete a idioma entity.
	 *
	 * @param Idioma $idioma The idioma entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(Idioma $idioma) {
		return $this->createFormBuilder()
			->setAction($this->generateUrl('idioma_delete', array('id' => $idioma->getId())))
			->setMethod('DELETE')
			->getForm()
		;
	}
}
