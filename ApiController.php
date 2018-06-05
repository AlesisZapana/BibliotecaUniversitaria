<?php

namespace UntdfBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Categorium controller.
 *
 * @Route("api")
 */
class ApiController extends Controller
{
    /**
     * @Route("/libros", name="api_libros")
     * @Method("GET")
     */
    public function librosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $libros = $em->getRepository('UntdfBundle:Libro')->findAll();

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->__toString();
        });

        $serializer = new Serializer(array($normalizer), array($encoder));
        $data = $serializer->serialize($libros, 'json');

        return new Response($data);
    }
}
