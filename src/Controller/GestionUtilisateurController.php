<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionUtilisateurController extends AbstractController
{
    /**
     * @Route("/gestion/utilisateur", name="gestion_utilisateur")
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $gestionUtilisateurs = $entityManager->getRepository(User::class)->findAll();
        return $this->render('gestion_utilisateur/index.html.twig', [
            'gestionUtilisateurs' => $gestionUtilisateurs
        ]);
    }

    //Supprimer
    /**
     * @Route("/sup_user/{id}", name="sup_user")
     *
     */
    public function sup_user(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $User=$em->getRepository(User::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($User);
        $entityManager->flush();

        return  $this->redirectToRoute("gestion_utilisateur",[], Response::HTTP_SEE_OTHER);
    }

    //Trier
    /**
     * @Route("/trier_username_asc", name="trier_username_asc")
     *
     */
    public function trier_nom_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $gestionUtilisateurs = $entityManager->getRepository(User::class)->findOBy([],['username' => 'ASC']);

        return $this->render('gestion_utilisateur/index.html.twig', [
            'gestionUtilisateurs' => $gestionUtilisateurs
        ]);
    }
    /**
     * @Route("/trier_username_desc", name="trier_username_desc")
     *
     */
    public function trier_nom_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $gestionUtilisateurs = $entityManager->getRepository(User::class)->findBy([],['username' => 'DESC']);

        return $this->render('gestion_utilisateur/index.html.twig', [
            'gestionUtilisateurs' => $gestionUtilisateurs
        ]);
    }
}
