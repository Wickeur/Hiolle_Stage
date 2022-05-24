<?php

namespace App\Repository;

use App\Entity\LesOrdiHiolleTechologies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LesOrdiHiolleTechologies>
 *
 * @method LesOrdiHiolleTechologies|null find($id, $lockMode = null, $lockVersion = null)
 * @method LesOrdiHiolleTechologies|null findOneBy(array $criteria, array $orderBy = null)
 * @method LesOrdiHiolleTechologies[]    findAll()
 * @method LesOrdiHiolleTechologies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LesOrdiHiolleTechologiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LesOrdiHiolleTechologies::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(LesOrdiHiolleTechologies $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(LesOrdiHiolleTechologies $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return LesOrdiHiolleTechologies[] Returns an array of LesOrdiHiolleTechologies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LesOrdiHiolleTechologies
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
