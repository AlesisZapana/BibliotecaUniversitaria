<?php

namespace LibrosBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LibrosBundle\Entity\Idioma;

/**
 *
 */
class AppFixtures extends Fixture implements ORMFixtureInterface {

	function load(ObjectManager $manager) {
		$idioma = new Idioma();
		$idioma->setNombre('Ingles');

		$manager->persist($idioma);

		$idioma_2 = new Idioma();
		$idioma_2->setNombre('Espanol');

		$manager->persist($idioma_2);
		$this->addReference("IDIOMA_ESPANOL", $idioma_2);

		$idioma_3 = new Idioma();
		$idioma_3->setNombre('Frances');

		$manager->persist($idioma_3);
		$manager->flush();

	}
}