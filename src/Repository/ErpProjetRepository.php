<?php

namespace App\Repository;

use App\Entity\ErpProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpProjet>
 *
 * @method ErpProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpProjet[]    findAll()
 * @method ErpProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpProjet::class);
    }

    //    /**
    //     * @return ErpProjet[] Returns an array of ErpProjet objects
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

    //    public function findOneBySomeField($value): ?ErpProjet
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
