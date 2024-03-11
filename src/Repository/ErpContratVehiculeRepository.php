<?php

namespace App\Repository;

use App\Entity\ErpContratVehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpContratVehicule>
 *
 * @method ErpContratVehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpContratVehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpContratVehicule[]    findAll()
 * @method ErpContratVehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpContratVehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpContratVehicule::class);
    }

    //    /**
    //     * @return ErpContratVehicule[] Returns an array of ErpContratVehicule objects
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

    //    public function findOneBySomeField($value): ?ErpContratVehicule
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
