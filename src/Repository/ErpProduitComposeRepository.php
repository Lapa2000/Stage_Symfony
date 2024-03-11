<?php

namespace App\Repository;

use App\Entity\ErpProduitCompose;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpProduitCompose>
 *
 * @method ErpProduitCompose|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpProduitCompose|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpProduitCompose[]    findAll()
 * @method ErpProduitCompose[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpProduitComposeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpProduitCompose::class);
    }

    //    /**
    //     * @return ErpProduitCompose[] Returns an array of ErpProduitCompose objects
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

    //    public function findOneBySomeField($value): ?ErpProduitCompose
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
