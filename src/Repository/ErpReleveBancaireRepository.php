<?php

namespace App\Repository;

use App\Entity\ErpReleveBancaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpReleveBancaire>
 *
 * @method ErpReleveBancaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpReleveBancaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpReleveBancaire[]    findAll()
 * @method ErpReleveBancaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpReleveBancaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpReleveBancaire::class);
    }

    //    /**
    //     * @return ErpReleveBancaire[] Returns an array of ErpReleveBancaire objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ErpReleveBancaire
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
