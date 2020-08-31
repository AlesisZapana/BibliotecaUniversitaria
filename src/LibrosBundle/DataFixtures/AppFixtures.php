<?php

namespace LibrosBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LibrosBundle\Entity\Idioma;
use AppBundle\Entity\User;

/**
 *
 */
class AppFixtures extends Fixture implements ORMFixtureInterface {

	//idiomas
	function load(ObjectManager $manager) {

		// $user=new User();
		// $user->setUsername('admin_biblioteca');
		// $user->setEmail('admin@gmail.com');

		//idiomas
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