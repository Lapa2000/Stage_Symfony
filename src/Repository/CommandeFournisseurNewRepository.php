<?php

namespace App\Repository;

use App\Entity\CommandeFournisseurNew;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CommandeFournisseurNew>
 *
 * @method CommandeFournisseurNew|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandeFournisseurNew|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandeFournisseurNew[]    findAll()
 * @method CommandeFournisseurNew[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeFournisseurNewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommandeFournisseurNew::class);
    }

    //    /**
    //     * @return CommandeFournisseurNew[] Returns an array of CommandeFournisseurNew objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CommandeFournisseurNew
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
