<?php

namespace LibrosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
	public function indexAction() {
		return $this->render('@Libros/Default/index.html.twig');
	}

	public function busquedaAction($libro) {
		$em = $this->getDoctrine()->getManager();
		//$librosBusqueda = $em->getRepository('LibrosBundle:Libro')->findByTitulo($libro);
		$libroRepo = $em->getRepository('LibrosBundle:Libro');
		$librosBusqueda = $libroRepo->buscar($libro);
		return $this->render('default/busqueda.html.twig', [
			'libros' => $librosBusqueda,
		]);
	}
}
