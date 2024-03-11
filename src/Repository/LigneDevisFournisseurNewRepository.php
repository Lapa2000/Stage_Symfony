<?php

namespace App\Repository;

use App\Entity\LigneDevisFournisseurNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LigneDevisFournisseurNew>
 *
 * @method LigneDevisFournisseurNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneDevisFournisseurNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneDevisFournisseurNew[]    findAll()
 * @method LigneDevisFournisseurNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneDevisFournisseurNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneDevisFournisseurNew::class);
    }

    //    /**
    //     * @return LigneDevisFournisseurNew[] Returns an array of LigneDevisFournisseurNew objects
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

    //    public function findOneBySomeField($value): ?LigneDevisFournisseurNew
    //    {
    //        return $this->createQueryBuilder('l')
    //            ->andWhere('l.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
