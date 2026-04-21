<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use App\Entity\Soiree;
use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
   public function load(ObjectManager $manager): void
   {
       $artistes = [];
       for ($i = 1; $i <= 5; $i++) {
           $artiste = new Artiste();
           $artiste->setNom('Artiste ' . $i);
           $manager->persist($artiste);
           $artistes[] = $artiste;
       }
       
       $themes = [];
       for ($i = 1; $i <= 5; $i++) {
           $theme = new Theme();
           $theme->setName('Theme ' . $i);
           $manager->persist($theme);
           $themes[] = $theme;
       }
       
       $manager->flush();
       
       for ($i = 1; $i <= 5; $i++) {
           $soiree = new Soiree();
           $soiree->setTitre('Soirée ' . $i);
           $soiree->setDateSoiree(new \DateTimeImmutable());
           $soiree->setDateCreation(new \DateTimeImmutable());
           $soiree->setTheme($themes[$i - 1]);
           $soiree->addArtiste($artistes[$i - 1]);
           $manager->persist($soiree);
       }
       
       $manager->flush();
   }
}
