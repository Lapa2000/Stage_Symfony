<?php

namespace App\Repository;

use App\Entity\ErpProduit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpProduit>
 *
 * @method ErpProduit|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpProduit|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpProduit[]    findAll()
 * @method ErpProduit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpProduit::class);
    }

    //    /**
    //     * @return ErpProduit[] Returns an array of ErpProduit objects
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

    //    public function findOneBySomeField($value): ?ErpProduit
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
