<?php

namespace App\Repository;

use App\Entity\ErpVehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpVehicule>
 *
 * @method ErpVehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpVehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpVehicule[]    findAll()
 * @method ErpVehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpVehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpVehicule::class);
    }

    //    /**
    //     * @return ErpVehicule[] Returns an array of ErpVehicule objects
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

    //    public function findOneBySomeField($value): ?ErpVehicule
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
