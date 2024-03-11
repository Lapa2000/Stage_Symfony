<?php

namespace App\Repository;

use App\Entity\OrdreDeFabrication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrdreDeFabrication>
 *
 * @method OrdreDeFabrication|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdreDeFabrication|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdreDeFabrication[]    findAll()
 * @method OrdreDeFabrication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdreDeFabricationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdreDeFabrication::class);
    }

    //    /**
    //     * @return OrdreDeFabrication[] Returns an array of OrdreDeFabrication objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?OrdreDeFabrication
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
