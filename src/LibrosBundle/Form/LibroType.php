<?php

namespace LibrosBundle\Form;

use LibrosBundle\Entity\Autor;
use LibrosBundle\Entity\Categoria;
use LibrosBundle\Entity\Idioma;
//use LibrosBundle\Form\AutorType;
//use LibrosBundle\Form\CategoriaType;
//use LibrosBundle\Form\IdiomaListType;
//use LibrosBundle\Form\AutorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
//use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LibroType extends AbstractType {
	/**
	 * {@inheritdoc}
	 */

	// public function getIdiomasChoice() {
	// 	$em = $this->getDoctrine()->getManager();
	// 	$idiomas = $em->getRepository("LibrosBundle:Idioma")->findAll();
	// }

	public function buildForm(FormBuilderInterface $builder, array $options) {

		//fecha de carga=now
		$builder->add('titulo')->add('isbn')->add('cantpaginas', IntegerType::class, ['attr' => [
			'min' => 1,
		]])
			->add('portada')->add('numEdicion', IntegerType::class, ['attr' => [
			'min' => 1,
		]])->add('anioEdicion', IntegerType::class, ['attr' => [
			'min' => 1,
		]])->add('editorial')->add('anioPublicacion', IntegerType::class, ['attr' => [
			'min' => 1,
		]])->add('descripcion')->add('resumen', TextareaType::class)->add('idioma', EntityType::class, [
			'class' => Idioma::class,
		])->add('fechaCarga', DateType::class, [
			'data' => new \DateTime('now'),
			'attr' => ['class' => 'invisible'],
		])
		//dropdown de categoria
			->add('categoria', EntityType::class, [
				'class' => Categoria::class,
				'multiple' => true,
				'choice_label' => function ($categoria) {
					return $categoria->getNombre();
				},
				'attr' => ['class' => 'tags'],
			])

		//dropdown de autor
			->add('autor', EntityType::class, [
				'class' => Autor::class,
				//'class' => 'autores',
				//'mapped' => false,
				'multiple' => true,
				'choice_label' => function ($autor) {
					return $autor->getNombreCompleto();
				},
				'attr' => ['class' => 'tags'],
			])
		;
		//generar un formulario autor dentro del form libro
		// ->add('Nuevo Autor', ButtonType::class, [
		// 	'attr' => ['class' => 'save btn-secondary',
		// 		'type' => 'button',
		// 		'data-toggle' => 'collapse',
		// 		'data-target' => '#librosbundle_libro_autor',
		// 		'aria-expanded' => 'false',
		// 		'aria-controls' => 'librosbundle_libro_autor'],
		// ])->add('autor', AutorType::class, [
		// 	'attr' => ['class' => 'collapse',
		// 	],
		// ]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'LibrosBundle\Entity\Libro',
		));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix() {
		return 'librosbundle_libro';
	}

}
