<?php

namespace App\Controller;

use App\Entity\LesOrdiGraff;
use App\Form\RechercheGraffType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GraffController extends AbstractController
{
    /**
     * @Route("/graff", name="graff")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['nom_station_graff' => 'ASC']);

        //Ajout
        $lesPC = new LesOrdiGraff();
        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesPC->setNomStationGraff($data["nom_station_graff"]);
            $lesPC->setUtilisateurGraff($data["utilisateur_graff"]);
            $lesPC->setMarqueStationGraff($data["marque_station_graff"]);
            $lesPC->setAdresseMacGraff($data["adresse_mac_graff"]);
            $lesPC->setTagGraff($data["tag_graff"]);
            $lesPC->setMicrosoftGraff(($data["microsoft_graff"]));
            $lesPC->setStationAcceuilGraff($data["station_acceuil_graff"]);
            $lesPC->setMoniteurGraff($data["moniteur_graff"]);
            $lesPC->setClavierSourisGraff($data["clavier_souris_graff"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            $msg = "Ajoutée avec succés";
            return $this->redirectToRoute('graff',[], Response::HTTP_SEE_OTHER);
        }
        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    //Modifier
    /**
     * @Route("/modif_graff/{id}", name="modif_graff")
     *
     */
    public function modif_graff(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $lesPC = $entityManager->getRepository(LesOrdiGraff::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesPC->setNomStationGraff($data["nom_station_graff"]);
            $lesPC->setUtilisateurGraff($data["utilisateur_graff"]);
            $lesPC->setMarqueStationGraff($data["marque_station_graff"]);
            $lesPC->setAdresseMacGraff($data["adresse_mac_graff"]);
            $lesPC->setTagGraff($data["tag_graff"]);
            $lesPC->setMicrosoftGraff(($data["microsoft_graff"]));
            $lesPC->setStationAcceuilGraff($data["station_acceuil_graff"]);
            $lesPC->setMoniteurGraff($data["moniteur_graff"]);
            $lesPC->setClavierSourisGraff($data["clavier_souris_graff"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_industries',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('graff/modif_graff.html.twig', [
            'LesOrdiGraff' => $lesPC,
        ]);
    }

    //Supprimer
    /**
     * @Route("/sup_graff/{id}", name="sup_graff")
     *
     */
    public function sup_graff(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesOrdinateurs=$em->getRepository(LesOrdiGraff::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesOrdinateurs);
        $entityManager->flush();

        return  $this->redirectToRoute("graff",[], Response::HTTP_SEE_OTHER);
    }

    //Recherche
    /**
     * @Route("/recherche_graff", name="recherche_graff")
     */
    ///Affichage par cathegorie dans la barre de recherche
    public function recherche_graff(Request $request)
    {
        $LesOrdi = new LesOrdiGraff();
        $form = $this->createForm(RechercheGraffType::class, $LesOrdi);
        $form->handleRequest($request);
        //Initialement le tableau des données est vides
        //c.a.d on affiche les données que lorsque l'utilisateur clique sur le bouton rechercher
        $lesPC = [];

        if ($form->isSubmitted() && $form->isValid()) {
            //On récupère le nom de la station  tapé dans le formulaire

            $user = $LesOrdi->getUtilisateurGraff();

            if ($user != "") {
                $lesPC = $this->getDoctrine()->getRepository(LesOrdiGraff::class)->findBy(['utilisateur_graff' => $user]);
            } else {
                //si si aucun non n'est fourni on affiche tous les données
                $lesPC = $this->getDoctrine()->getRepository(LesOrdiGraff::class)->findAll();
            }
        }
        return $this->render('graff/recherche_graff.html.twig', [
            'form' => $form->createView(),
            'LesOrdiGraff' => $lesPC
        ]);
    }

    /////////
    //Trier//
    /////////
    /**
     * @Route("/trier_nom_graff_asc", name="trier_nom_graff_asc")
     *
     */
    public function trier_nom_graff_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['nom_station_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_nom_graff_desc", name="trier_nom_graff_desc")
     *
     */
    public function trier_nom_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['nom_station_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_user_graff_asc", name="trier_user_graff_asc")
     *
     */
    public function trier_user_graff_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['utilisateur_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_user_graff_desc", name="trier_user_graff_desc")
     *
     */
    public function trier_user_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['utilisateur_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_marque_graff_asc", name="trier_marque_graff_asc")
     *
     */
    public function trier_marque_graff_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['marque_station_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_marque_graff_desc", name="trier_marque_graff_desc")
     *
     */
    public function trier_marque_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['marque_station_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_mac_graff_asc", name="trier_mac_graff_asc")
     *
     */
    public function trier_mac_graff_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['adresse_mac_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_mac_graff_desc", name="trier_mac_graff_desc")
     *
     */
    public function trier_mac_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['adresse_mac_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_tag_graff_asc", name="trier_tag_graff_asc")
     *
     */
    public function trier_tag_graff_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['tag_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_tag_graff_desc", name="trier_tag_graff_desc")
     *
     */
    public function trier_tag_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['tag_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_micro_graff_asc", name="trier_micro_graff_asc")
     *
     */
    public function trier_micro_graff_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['microsoft_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_micro_graff_desc", name="trier_micro_graff_desc")
     *
     */
    public function trier_micro_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['microsoft_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_station_graff_asc", name="trier_station_graff_asc")
     *
     */
    public function trier_station_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['station_acceuil_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_station_graff_desc", name="trier_station_graff_desc")
     *
     */
    public function trier_station_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['station_acceuil_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_moniteur_graff_asc", name="trier_moniteur_graff_asc")
     *
     */
    public function trier_moniteur_graff_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['moniteur_h_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_moniteur_graff_desc", name="trier_moniteur_graff_desc")
     *
     */
    public function trier_moniteur_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['moniteur_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_CS_graff_asc", name="trier_CS_graff_asc")
     *
     */
    public function trier_CS_graff_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['clavier_souris_graff' => 'ASC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_CS_graff_desc", name="trier_CS_graff_desc")
     *
     */
    public function trier_CS_graff_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiGraff::class)->findBy([],['clavier_souris_graff' => 'DESC']);

        return $this->render('graff/index.html.twig', [
            'LesOrdiGraff' => $lesOrdi
        ]);
    }
}
