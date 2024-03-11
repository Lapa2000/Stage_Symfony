<?php

namespace App\Repository;

use App\Entity\OrdreDeProduction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrdreDeProduction>
 *
 * @method OrdreDeProduction|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdreDeProduction|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdreDeProduction[]    findAll()
 * @method OrdreDeProduction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdreDeProductionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdreDeProduction::class);
    }

    //    /**
    //     * @return OrdreDeProduction[] Returns an array of OrdreDeProduction objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?OrdreDeProduction
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
