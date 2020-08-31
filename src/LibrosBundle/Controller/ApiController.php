<?php

namespace LibrosBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\HttpFoundation\Response;

// use Symfony\Component\Serializer\Encoder\JsonEncoder;
// use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
// use Symfony\Component\Serializer\Serializer;

/**
 *
 */
class ApiController extends Controller {

//criterios
	//(Request $request)
	public function busquedaAction(Request $request) {

		$criterios = $request->query->get('busqueda');

		$em = $this->getDoctrine()->getManager();

		$libros = $em->getRepository('LibrosBundle:Libro')->buscarApi($criterios);

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
		//cambiar a findOneById, revisar las apps moviles
		$unLibro = $em->getRepository('LibrosBundle:Libro')->findOneById($libro);
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