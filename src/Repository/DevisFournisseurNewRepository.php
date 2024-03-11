<?php

namespace App\Repository;

use App\Entity\DevisFournisseurNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DevisFournisseurNew>
 *
 * @method DevisFournisseurNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method DevisFournisseurNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method DevisFournisseurNew[]    findAll()
 * @method DevisFournisseurNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DevisFournisseurNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DevisFournisseurNew::class);
    }

    //    /**
    //     * @return DevisFournisseurNew[] Returns an array of DevisFournisseurNew objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?DevisFournisseurNew
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
