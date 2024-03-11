<?php

namespace App\Repository;

use App\Entity\Notedefrais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Notedefrais>
 *
 * @method Notedefrais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Notedefrais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Notedefrais[]    findAll()
 * @method Notedefrais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotedefraisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notedefrais::class);
    }

    //    /**
    //     * @return Notedefrais[] Returns an array of Notedefrais objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('n.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Notedefrais
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
