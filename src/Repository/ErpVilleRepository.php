<?php

namespace App\Repository;

use App\Entity\ErpVille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpVille>
 *
 * @method ErpVille|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpVille|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpVille[]    findAll()
 * @method ErpVille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpVilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpVille::class);
    }

    //    /**
    //     * @return ErpVille[] Returns an array of ErpVille objects
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

    //    public function findOneBySomeField($value): ?ErpVille
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
