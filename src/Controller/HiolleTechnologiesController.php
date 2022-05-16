<?php

namespace App\Controller;

use App\Entity\LesOrdiHiolleTechnologies;
use App\Form\RechercheHiolleTechnologiesType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HiolleTechnologiesController extends AbstractController
{
    /**
     * @Route("/hiolle/technologies", name="hiolle_technologies")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);

        //Ajout
        $lesPC = new LesOrdiHiolleTechnologies();
        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesPC->setNomStationHTech($data["nom_station_h_tech"]);
            $lesPC->setUtilisateurHTech($data["utilisateur_h_tech"]);
            $lesPC->setMarqueStationHTech($data["marque_station_h_tech"]);
            $lesPC->setAdresseMacHTech($data["adresse_mac_h_tech"]);
            $lesPC->setTagHTech($data["tag_h_tech"]);
            $lesPC->setMicrosoftHTech(($data["microsoft_h_tech"]));
            $lesPC->setStationAcceuilHTech($data["station_acceuil_h_tech"]);
            $lesPC->setMoniteurHTech($data["moniteur_h_tech"]);
            $lesPC->setClavierSourisHTech($data["clavier_souris_h_tech"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    //Modifier
    /**
     * @Route("/modif_hiolle_technologies/{id}", name="modif_hiolle_technologies")
     *
     */
    public function modif_hiolle_technologies(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $lesPC = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesPC->setNomStationHTech($data["nom_station_h_tech"]);
            $lesPC->setUtilisateurHTech($data["utilisateur_h_tech"]);
            $lesPC->setMarqueStationHTech($data["marque_station_h_tech"]);
            $lesPC->setAdresseMacHTech($data["adresse_mac_h_tech"]);
            $lesPC->setTagHTech($data["tag_h_tech"]);
            $lesPC->setMicrosoftHTech(($data["microsoft_h_tech"]));
            $lesPC->setStationAcceuilHTech($data["station_acceuil_h_tech"]);
            $lesPC->setMoniteurHTech($data["moniteur_h_tech"]);
            $lesPC->setClavierSourisHTech($data["clavier_souris_h_tech"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/modif_hiolle_technologies.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesPC,
        ]);
    }

    //Supprimer
    /**
     * @Route("/sup_hiolle_technologies/{id}", name="sup_hiolle_technologies")
     *
     */
    public function sup_hiolle_technologies(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesOrdinateurs=$em->getRepository(LesOrdiHiolleTechnologies::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesOrdinateurs);
        $entityManager->flush();

        return  $this->redirectToRoute("hiolle_technologies",[], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/recherche_hiolle_technologies", name="recherche_hiolle_technologies")
     */
    ///Affichage par cathegorie dans la barre de recherche
    public function recherche_hiolle_technologies(Request $request)
    {
        $LesOrdi = new LesOrdiHiolleTechnologies();
        $form = $this->createForm(RechercheHiolleTechnologiesType::class, $LesOrdi);
        $form->handleRequest($request);
        //Initialement le tableau des données est vides
        //c.a.d on affiche les données que lorsque l'utilisateur clique sur le bouton rechercher
        $lesPC = [];

        if ($form->isSubmitted() && $form->isValid()) {
            //On récupère le nom de la station  tapé dans le formulaire

            $user = $LesOrdi->getUtilisateurHTech();

            if ($user != "") {
                $lesPC = $this->getDoctrine()->getRepository(LesOrdiHiolleTechnologies::class)->findBy(['utilisateur_h_tech' => $user]);
            } else {
                //si si aucun non n'est fourni on affiche tous les données
                $lesPC = $this->getDoctrine()->getRepository(LesOrdiHiolleTechnologies::class)->findAll();
            }
        }
        return $this->render('hiolle_technologies/recherche_hiolle_technologies.html.twig', [
            'form' => $form->createView(),
            'LesOrdiHiolleTechnologies' => $lesPC
        ]);
    }

    /////////
    //Trier//
    /////////
    /**
     * @Route("/trier_nom_h_tech_asc", name="trier_nom_h_tech_asc")
     *
     */
    public function trier_nom_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_nom_h_tech_desc", name="trier_nom_h_tech_desc")
     *
     */
    public function trier_nom_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_user_h_tech_asc", name="trier_user_h_tech_asc")
     *
     */
    public function trier_user_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['utilisateur_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_user_h_tech_desc", name="trier_user_h_tech_desc")
     *
     */
    public function trier_user_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['utilisateur_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_marque_h_tech_asc", name="trier_marque_h_tech_asc")
     *
     */
    public function trier_marque_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['marque_station_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_marque_h_tech_desc", name="trier_marque_h_tech_desc")
     *
     */
    public function trier_marque_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['marque_station_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_mac_h_tech_asc", name="trier_mac_h_tech_asc")
     *
     */
    public function trier_mac_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['adresse_mac_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_mac_h_tech_desc", name="trier_mac_h_tech_desc")
     *
     */
    public function trier_mac_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['adresse_mac_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_tag_h_tech_asc", name="trier_tag_h_tech_asc")
     *
     */
    public function trier_tag_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['tag_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_tag_h_tech_desc", name="trier_tag_h_tech_desc")
     *
     */
    public function trier_tag_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['tag_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_micro_h_tech_asc", name="trier_micro_h_tech_asc")
     *
     */
    public function trier_micro_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['microsoft_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_micro_h_tech_desc", name="trier_micro_h_tech_desc")
     *
     */
    public function trier_micro_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['microsoft_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_station_h_tech_asc", name="trier_station_h_tech_asc")
     *
     */
    public function trier_station_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['station_acceuil_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_station_h_tech_desc", name="trier_station_h_tech_desc")
     *
     */
    public function trier_station_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['station_acceuil_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_moniteur_h_tech_asc", name="trier_moniteur_h_tech_asc")
     *
     */
    public function trier_moniteur_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['moniteur_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_moniteur_h_tech_desc", name="trier_moniteur_h_tech_desc")
     *
     */
    public function trier_moniteur_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['moniteur_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_CS_h_tech_asc", name="trier_CS_h_tech_asc")
     *
     */
    public function trier_CS_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['clavier_souris_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_CS_h_tech_desc", name="trier_CS_h_tech_desc")
     *
     */
    public function trier_CS_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['clavier_souris_h_tech' => 'DESC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
}
