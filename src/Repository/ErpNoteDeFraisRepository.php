<?php

namespace App\Repository;

use App\Entity\ErpNoteDeFrais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpNoteDeFrais>
 *
 * @method ErpNoteDeFrais|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpNoteDeFrais|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpNoteDeFrais[]    findAll()
 * @method ErpNoteDeFrais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpNoteDeFraisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpNoteDeFrais::class);
    }

    //    /**
    //     * @return ErpNoteDeFrais[] Returns an array of ErpNoteDeFrais objects
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

    //    public function findOneBySomeField($value): ?ErpNoteDeFrais
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
