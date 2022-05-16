<?php

namespace App\Repository;

use App\Entity\LesOrdiHiolleTechnologies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LesOrdiHiolleTechnologies>
 *
 * @method LesOrdiHiolleTechnologies|null find($id, $lockMode = null, $lockVersion = null)
 * @method LesOrdiHiolleTechnologies|null findOneBy(array $criteria, array $orderBy = null)
 * @method LesOrdiHiolleTechnologies[]    findAll()
 * @method LesOrdiHiolleTechnologies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LesOrdiHiolleTechnologiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LesOrdiHiolleTechnologies::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(LesOrdiHiolleTechnologies $entity, bool $flush = true): void
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
    public function remove(LesOrdiHiolleTechnologies $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return LesOrdiHiolleTechnologies[] Returns an array of LesOrdiHiolleTechnologies objects
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
    public function findOneBySomeField($value): ?LesOrdiHiolleTechnologies
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
