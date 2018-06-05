<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Busqueda;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Busqueda controller.
 *
 */
class BusquedaController extends Controller
{
    /**
     * Lists all busqueda entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $busquedas = $em->getRepository('AppBundle:Busqueda')->findAll();

        return $this->render('busqueda/index.html.twig', array(
            'busquedas' => $busquedas,
        ));
    }

    /**
     * Finds and displays a busqueda entity.
     *
     */
    public function showAction(Busqueda $busqueda)
    {

        return $this->render('busqueda/show.html.twig', array(
            'busqueda' => $busqueda,
        ));
    }
}
