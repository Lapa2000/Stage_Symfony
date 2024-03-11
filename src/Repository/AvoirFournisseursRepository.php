<?php

namespace App\Repository;

use App\Entity\AvoirFournisseurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AvoirFournisseurs>
 *
 * @method AvoirFournisseurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvoirFournisseurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvoirFournisseurs[]    findAll()
 * @method AvoirFournisseurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvoirFournisseursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvoirFournisseurs::class);
    }

    //    /**
    //     * @return AvoirFournisseurs[] Returns an array of AvoirFournisseurs objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AvoirFournisseurs
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
