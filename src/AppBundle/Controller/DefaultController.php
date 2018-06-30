<?php

namespace AppBundle\Controller;

use LibrosBundle\Entity\Categoria;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\setMethod;
use Symfony\Component\HttpFoundation\Request;

//use Symfony\Component\Translation\TranslatorInterface;

class DefaultController extends Controller {
	/**
	 * @Route("/", name="homepage")
	 */
	public function indexAction(Request $request) {

		$request->setLocale('en');

		//var_dump(print_r($request->getLocale()));

		$name = 'Ale';
		$translated = $this->get('translator')->trans('Hola, %name% como estas?',
			['%name%' => $name]);

		//return new Response($translated);

		$form = $this->createFormBuilder()
			->setMethod('GET')
			->add('busqueda', TextType::class, [
				'required' => false,
				'attr' => ['placeholder' => 'Busqueda'],
			])
			->add('categoria', EntityType::class, [
				'class' => Categoria::class,
				'multiple' => true,
				'required' => false,
				'choice_label' => function ($categoria) {
					return $categoria->getNombre();
				},
				'attr' => ['class' => 'tags'],
			])
			->add('Buscar', SubmitType::class)
			->getForm();

		$em = $this->getDoctrine()->getEntityManager();
		$em2 = $this->getDoctrine()->getEntityManager();

		$librosq = '';
		$categoriasq = '';
		$form->handleRequest($request);

		$criteria = [];
		if ($form->isValid()) {
			$criteria = $form->getData();
			// $categoriasq = $em2->getRepository('LibrosBundle:Categoria')->findByNombre($criteria['categoria']);
		}

		$librosq = $em->getRepository('LibrosBundle:Libro')->buscar($criteria);

		$libros = $librosq;
		//$categorias = $categoriasq;
		// replace this example code with whatever you need

		return $this->render('default/busqueda.html.twig', [
			'libros' => $libros,
			'form' => $form->createView(),
			'name' => $name,
		]);
	}

}
