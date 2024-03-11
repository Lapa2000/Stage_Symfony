<?php

namespace App\Repository;

use App\Entity\ErpDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ErpDocument>
 *
 * @method ErpDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method ErpDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method ErpDocument[]    findAll()
 * @method ErpDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErpDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ErpDocument::class);
    }

    //    /**
    //     * @return ErpDocument[] Returns an array of ErpDocument objects
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

    //    public function findOneBySomeField($value): ?ErpDocument
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
