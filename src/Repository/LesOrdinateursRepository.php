<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\LesOrdinateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LesOrdinateurs>
 *
 * @method LesOrdinateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method LesOrdinateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method LesOrdinateurs[]    findAll()
 * @method LesOrdinateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LesOrdinateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LesOrdinateurs::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(LesOrdinateurs $entity, bool $flush = true): void
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
    public function remove(LesOrdinateurs $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /** Test */
     /* Recupère les produits en lien avec une recherche
     * @return LesOrdinateurs[]
     */
    /*public function findSearch(SearchData $search ):array
    {
        $query = $this->createQueryBuilder('q'); //récupérer les produits

        //return $this->findAll();

        if (!empty($search->q)){
            $query = $query
                ->andWhere('q.Nom_de_la_staion LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        return $query->getQuery()->getResult();
    }*/

    // /**
    //  * @return LesOrdinateurs[] Returns an array of LesOrdinateurs objects
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
    public function findOneBySomeField($value): ?LesOrdinateurs
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
