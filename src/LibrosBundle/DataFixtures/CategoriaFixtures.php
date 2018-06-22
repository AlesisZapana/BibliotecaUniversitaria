<?php

namespace LibrosBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LibrosBundle\Entity\Categoria;

class CategoriaFixtures extends Fixture implements ORMFixtureInterface {

	function load(ObjectManager $manager) {

		$categoria = new Categoria();
		$categoria->setNombre('Ficcion');
		$manager->persist($categoria);

		$categoria = new Categoria();
		$categoria->setNombre('Terror');
		$manager->persist($categoria);

		$categoria2 = new Categoria();
		$categoria2->setNombre('Suspenso');
		$manager->persist($categoria2);

		$this->addReference("CATEGORIA_SUSPENSO", $categoria2);

		$manager->flush();
	}
}