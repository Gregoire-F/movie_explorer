<?php

// namespace App\DataFixtures;

// use App\Entity\Soiree;
// use DateTimeImmutable;
// use Doctrine\Bundle\FixturesBundle\Fixture;
// use Doctrine\Persistence\ObjectManager;

// class AppFixtures extends Fixture
// {
//     public function load(ObjectManager $manager): void
//     {
//         $soiree = new Soiree();
//         $soiree->setTitre("Noël");
//         $soiree->setDateSoiree(new DateTimeImmutable("2026-12-24"));
//         $soiree->setDateCreation(new DateTimeImmutable());
//         $soiree->setStatut("a mettre en place");
//         $manager->persist($soiree);
//         $manager->flush();
//     }
// }
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\SoireeFactory;

class AppFixtures extends Fixture
{
   public function load(ObjectManager $manager): void
   {
       SoireeFactory::createMany(5);
   }
}