<?php

namespace LibrosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdiomaListType extends AbstractType {
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('nombre', 'entity', [
			'class' => 'LibrosBundle:Idioma',
			'property' => 'nombre',
		]);
	}/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'LibrosBundle\Entity\Idioma',
		));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix() {
		return 'librosbundle_idioma';
	}

}
