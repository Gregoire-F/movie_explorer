<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use App\Entity\Soiree;
use App\Entity\Theme;
use App\Factory\ArtisteFactory;
use App\Factory\ThemeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $artistes = ArtisteFactory::createMany(5);

        $themes = ThemeFactory::createMany(5);

        $manager->flush();

        $soiree = new Soiree();
        $soiree->setTitre('Soirée de lancement');
        $soiree->setDateSoiree(new \DateTimeImmutable());
        $soiree->setDateCreation(new \DateTimeImmutable());
        $soiree->setTheme($themes[0]);
        $soiree->addArtiste($artistes[0]);
        $manager->persist($soiree);


        $manager->flush();
    }
}
