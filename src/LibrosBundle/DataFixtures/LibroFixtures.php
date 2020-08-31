<?php

namespace LibrosBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LibrosBundle\Entity\Libro;
use \DateTime;

/**
 *
 */
class LibroFixtures extends Fixture implements ORMFixtureInterface {

	function load(ObjectManager $manager) {
		$libro = new Libro();
		$libro->setTitulo('Cronica de una muerte anunciada');
		$libro->setIsbn(32313312);
		$libro->setCantpaginas(332);
		$libro->setPortada('https://http2.mlstatic.com/cronica-de-una-muerte-anunciada-gabriel-garcia-marquez-D_NQ_NP_9463-MLU20016628868_122013-O.webp');
		$libro->setNumEdicion(2);
		$libro->setEditorial('Planeta');
		$libro->setDescripcion('Crónica de una muerte anunciada es una novela del escritor colombiano Gabriel García Márquez, publicada por primera vez en 1981. Fue incluida en la lista de las 100 mejores novelas en español del siglo XX del periódico español El Mundo.

			La novela representó un acercamiento entre lo periodístico y lo narrativo, y una aproximación a la novela policíaca. La historia contada se inspira en un suceso real, ocurrido en 1951, del que el autor tomó la acción central (el crimen), los protagonistas, el escenario y las circunstancias, alterándolo narrativamente, pero sin descuidar nunca los datos y las precisiones obligadas en toda crónica periodística.');
		$libro->setAnioEdicion(2010);
		$libro->setFechaCarga(new DateTime('now'));
		$libro->setResumen('En un pequeño y aislado pueblo en la costa del Caribe, se casan Bayardo San Román, un hombre rico y recién llegado, y Ángela Vicario.');
		$libro->setIdioma($this->getReference("IDIOMA_ESPANOL"));
		$libro->setAnioPublicacion(1981);
		$libro->addCategorium($this->getReference("CATEGORIA_SUSPENSO"));
		$libro->addAutor($this->getReference("AUTOR_MARQUEZ"));
		$manager->persist($libro);
		//$manager->flush();

		$libro1=new Libro();
		$libro1->setTitulo('Cien años de soledad');
		$libro1->setIsbn(12345);
		$libro1->setCantpaginas(471);
		$libro1->setPortada('https://images-na.ssl-images-amazon.com/images/I/51egIZUl88L._SX336_BO1,204,203,200_.jpg');
		$libro1->setNumEdicion(2);
		$libro1->setEditorial('Debolsillo');
		$libro1->setDescripcion('José Arcadio Buendía y Úrsula Iguarán son un matrimonio de primos que se casaron llenos de presagios y temores por su parentesco y el mito existente en la región de que su descendencia podía tener cola de cerdo. En una pelea de gallos en la que resultó muerto el animal de Prudencio Aguilar, éste, enardecido por la derrota, le gritó a José Arcadio Buendía, dueño del vencedor: «A ver si ese gallo le hace el favor a tu mujer», ya que la gente del pueblo sospechaba que José Arcadio y Úrsula no habían tenido relaciones en un año de matrimonio (por el miedo de Úrsula de que la descendencia naciera con cola de cerdo). Así fue como José Arcadio Buendía reta en duelo a Prudencio, en el que José Arcadio lo mata al atravesarle la garganta con una lanza. Sin embargo, su fantasma lo atormenta apareciéndose repetidas veces en su casa lavándose la herida mortal con un tapón de esparto. Así es como José Arcadio Buendía y Úrsula Iguarán deciden irse a la sierra. En medio del camino José Arcadio Buendía tiene un sueño en que se le aparecen construcciones con paredes de espejo y, preguntando su nombre, le responden "Macondo". Así, despierto del sueño, decide detener la caravana, hacer un claro en la selva y habitar ahí');
		$libro1->setAnioEdicion(2000);
		$libro1->setFechaCarga(new DateTime('now'));
		$libro1->setResumen('El libro se compone de 20 capítulos no titulados, en los cuales se narra una historia con una estructura cíclica temporal.');
		$libro1->setIdioma($this->getReference("IDIOMA_ESPANOL"));
		$libro1->setAnioPublicacion(1967);
		$libro1->addCategorium($this->getReference("CATEGORIA_SUSPENSO"));
		$libro1->addAutor($this->getReference("AUTOR_MARQUEZ"));

		$manager->persist($libro1);
		$manager->flush();
	}
}