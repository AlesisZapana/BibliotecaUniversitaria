<?php

namespace LibrosBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LibrosBundle\Entity\Autor;

/**
 *
 */
class AutorFixtures extends Fixture implements ORMFixtureInterface {

	function load(ObjectManager $manager) {
		$autor = new Autor();
		$autor->setNombre('Gabriel');
		$autor->setApellido('Garcia Marquez');
		$autor->setBiografia('Está relacionado de manera inherente con el realismo mágico y su obra más conocida, la novela Cien años de soledad, es considerada una de las más representativas de este movimiento literario e incluso se considera que por el éxito de la novela es que tal término se aplica a la literatura surgida a partir de los años 1960 en América Latina.');
		$autor->setWeb('https://www.biografiasyvidas.com/reportaje/garcia_marquez/');
		$autor->setFoto('https://www.biografiasyvidas.com/reportaje/garcia_marquez/fotos/garcia_marquez_420a.jpg');
		$manager->persist($autor);

		$this->addReference("AUTOR_MARQUEZ", $autor);

		$manager->flush();

	}
}