<?php

namespace LibrosBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

//use Symfony\Component\HttpFoundation\Response;

// use Symfony\Component\Serializer\Encoder\JsonEncoder;
// use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
// use Symfony\Component\Serializer\Serializer;

/**
 *
 */
class ApiController extends Controller {

	public function busquedaAction($libro) {

		$em = $this->getDoctrine()->getManager();
		$libros = $em->getRepository('LibrosBundle:Libro')->buscar($libro);

		$data = $this->get('jms_serializer')->serialize($libros, 'json');

		$response = new JsonResponse(json_decode($data));

		$response->headers->remove('Connection', 'close');
		$response->headers->set('Connection', 'Keep-alive');

		return $response;
		return $this->render('default/api_busqueda.html.twig', [
			'data' => $data,
		]);
	}

	public function fichaAction($libro) {
		$em = $this->getDoctrine()->getManager();
		$unLibro = $em->getRepository('LibrosBundle:Libro')->findById($libro);
		$data = $this->get('jms_serializer')->serialize($unLibro, 'json');
		$response = new JsonResponse(json_decode($data));
		$response->headers->remove('Connection', 'close');
		$response->headers->set('Connection', 'Keep-alive');
		return $response;

		return $this->render('default/api_ficha.html.twig', [
			'data' => $data,
		]);
	}
}