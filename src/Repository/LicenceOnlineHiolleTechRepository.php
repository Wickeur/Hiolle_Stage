<?php

namespace App\Repository;

use App\Entity\LicenceOnlineHiolleTech;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LicenceOnlineHiolleTech>
 *
 * @method LicenceOnlineHiolleTech|null find($id, $lockMode = null, $lockVersion = null)
 * @method LicenceOnlineHiolleTech|null findOneBy(array $criteria, array $orderBy = null)
 * @method LicenceOnlineHiolleTech[]    findAll()
 * @method LicenceOnlineHiolleTech[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LicenceOnlineHiolleTechRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LicenceOnlineHiolleTech::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(LicenceOnlineHiolleTech $entity, bool $flush = true): void
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
    public function remove(LicenceOnlineHiolleTech $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return LicenceOnlineHiolleTech[] Returns an array of LicenceOnlineHiolleTech objects
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
    public function findOneBySomeField($value): ?LicenceOnlineHiolleTech
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
