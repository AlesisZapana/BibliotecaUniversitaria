<?php
namespace LibrosBundle\Twig;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 *
 */
class JsonTwig extends \Twig_Extension {

	protected $container;

	public function __construct(ContainerInterface $container) {
		$this->container = $container;
	}

	public function getName() {
		return 'some.extension';
	}

	public function getFilters() {
		return array(
			'json_decode' => new \Twig_Filter_Method($this, 'jsonDecode'),
		);
	}

	public function jsonDecode($str) {
		return json_decode($str);
	}
}