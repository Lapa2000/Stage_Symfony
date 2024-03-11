<?php

namespace App\Repository;

use App\Entity\ErpCatalogue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpCatalogue>
 *
 * @method ErpCatalogue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpCatalogue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpCatalogue[]    findAll()
 * @method ErpCatalogue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpCatalogueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpCatalogue::class);
    }

    //    /**
    //     * @return ErpCatalogue[] Returns an array of ErpCatalogue objects
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

    //    public function findOneBySomeField($value): ?ErpCatalogue
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
