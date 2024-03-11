<?php

namespace App\Repository;

use App\Entity\LigneCommandeFournisseurNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneCommandeFournisseurNew>
 *
 * @method LigneCommandeFournisseurNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneCommandeFournisseurNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneCommandeFournisseurNew[]    findAll()
 * @method LigneCommandeFournisseurNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneCommandeFournisseurNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneCommandeFournisseurNew::class);
    }

    //    /**
    //     * @return LigneCommandeFournisseurNew[] Returns an array of LigneCommandeFournisseurNew objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('l.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?LigneCommandeFournisseurNew
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
