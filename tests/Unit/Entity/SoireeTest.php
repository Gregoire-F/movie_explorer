<?php

namespace App\Tests\Unit\Entity;

// use App\Entity\Soiree;
// use App\Entity\Artiste;
// use PHPUnit\Framework\TestCase;

// class SoireeTest extends TestCase
// {
//     public function testSetAndGetTitre(): void
//     {
//         $soiree = new Soiree();
//         $soiree->setTitre('Soirée Electro');
//         $soiree->setStatut('a venir');
//         self::assertSame('Soirée Electro', $soiree->getTitre());
//         self::assertSame('a venir', $soiree->getStatut());
//     }
//     public function testAddArtiste(): void
// {
//     $soiree = new Soiree();
//     $artiste = new Artiste();

//     $soiree->addArtiste($artiste);
//     $soiree->addArtiste($artiste);

//     self::assertCount(1, $soiree->getArtistes());
// }
// }
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SoireeTest extends WebTestCase
{
    public function testPageAccueil(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        self::assertResponseIsSuccessful();
    }
}