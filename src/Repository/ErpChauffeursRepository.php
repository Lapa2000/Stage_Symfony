<?php

namespace App\Repository;

use App\Entity\ErpChauffeurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpChauffeurs>
 *
 * @method ErpChauffeurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpChauffeurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpChauffeurs[]    findAll()
 * @method ErpChauffeurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpChauffeursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpChauffeurs::class);
    }

    //    /**
    //     * @return ErpChauffeurs[] Returns an array of ErpChauffeurs objects
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

    //    public function findOneBySomeField($value): ?ErpChauffeurs
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
