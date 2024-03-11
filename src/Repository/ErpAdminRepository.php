<?php

namespace App\Repository;

use App\Entity\ErpAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpAdmin>
 *
 * @method ErpAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpAdmin[]    findAll()
 * @method ErpAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpAdminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpAdmin::class);
    }

    //    /**
    //     * @return ErpAdmin[] Returns an array of ErpAdmin objects
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

    //    public function findOneBySomeField($value): ?ErpAdmin
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
