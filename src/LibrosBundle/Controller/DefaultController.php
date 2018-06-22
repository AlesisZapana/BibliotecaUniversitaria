<?php

namespace LibrosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
	public function indexAction() {
		return $this->render('@Libros/Default/index.html.twig');
	}

	public function busquedaTituloAction($libro) {
		$em = $this->getDoctrine()->getManager();
		$libroRepo = $em->getRepository('LibrosBundle:Libro');
		$librosBusqueda = $libroRepo->buscar($libro);
		return $this->render('default/busqueda.html.twig', [
			'libros' => $librosBusqueda,
		]);
	}

	public function todasCategoriasAction() {
		$em = $this->getDoctrine()->getManager();
		$categoriaRepo = $em->getRepository('LibrosBundle:Categoria');
		$categorias = $categoriaRepo->findAll();
		return $this->render('default/categorias.html.twig', [
			'categorias' => $categorias,
		]);
	}

	public function FunctionName($value = '') {
		# code...
	}
}
