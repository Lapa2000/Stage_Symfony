<?php

namespace App\Repository;

use App\Entity\ErpFeuilleDeTemps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpFeuilleDeTemps>
 *
 * @method ErpFeuilleDeTemps|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpFeuilleDeTemps|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpFeuilleDeTemps[]    findAll()
 * @method ErpFeuilleDeTemps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpFeuilleDeTempsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpFeuilleDeTemps::class);
    }

    //    /**
    //     * @return ErpFeuilleDeTemps[] Returns an array of ErpFeuilleDeTemps objects
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

    //    public function findOneBySomeField($value): ?ErpFeuilleDeTemps
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
