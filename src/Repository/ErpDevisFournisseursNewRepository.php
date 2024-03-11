<?php

namespace App\Repository;

use App\Entity\ErpDevisFournisseursNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpDevisFournisseursNew>
 *
 * @method ErpDevisFournisseursNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpDevisFournisseursNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpDevisFournisseursNew[]    findAll()
 * @method ErpDevisFournisseursNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpDevisFournisseursNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpDevisFournisseursNew::class);
    }

    //    /**
    //     * @return ErpDevisFournisseursNew[] Returns an array of ErpDevisFournisseursNew objects
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

    //    public function findOneBySomeField($value): ?ErpDevisFournisseursNew
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
