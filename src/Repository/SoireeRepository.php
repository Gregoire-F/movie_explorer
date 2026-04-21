<?php

namespace App\Repository;

use App\Entity\Soiree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Soiree>
 */
class SoireeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Soiree::class);
    }

    /**
     * @return Soiree[] Returns an array of Soiree objects
     */
    public function findProchaineSoirees(): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.dateSoiree >= :now')          
            ->setParameter('now', new \DateTime())
            ->orderBy('s.dateSoiree', 'ASC')         
            ->setMaxResults(3)                  
            ->getQuery()
            ->getResult();
    }

    public function findOneBySomeField($value): ?Soiree
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
