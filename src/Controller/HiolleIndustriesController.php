<?php

namespace App\Controller;

use App\Entity\LesOrdiHiolleIndustries;
use App\Form\RechercheHiolleIndustriesType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HiolleIndustriesController extends AbstractController
{
    /**
     * @Route("/hiolle/industries", name="hiolle_industries")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['nom_station_h_indu' => 'ASC']);

        $lesPC = new LesOrdiHiolleIndustries();

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesPC->setNomStationHIndu($data["nom_station_h_indu"]);
            $lesPC->setUtilisateurHIndu($data["utilisateur_h_indu"]);
            $lesPC->setMarqueStationHIndu($data["marque_station_h_indu"]);
            $lesPC->setAdresseMacHIndu($data["adresse_mac_h_indu"]);
            $lesPC->setTagHIndu($data["tag_h_indu"]);
            $lesPC->setMicrosoftHIndu(($data["microsoft_h_indu"]));
            $lesPC->setStationAcceuilHIndu($data["station_acceuil_h_indu"]);
            $lesPC->setMoniteurHIndu($data["moniteur_h_indu"]);
            $lesPC->setClavierSourisHIndu($data["clavier_souris_h_indu"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_industries', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    //Modifier
    /**
     * @Route("/modif_hiolle_industries/{id}", name="modif_hiolle_industries")
     *
     */
    public function modif_hiolle_industries(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $lesPC = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesPC->setNomStationHIndu($data["nom_station_h_indu"]);
            $lesPC->setUtilisateurHIndu($data["utilisateur_h_indu"]);
            $lesPC->setMarqueStationHIndu($data["marque_station_h_indu"]);
            $lesPC->setAdresseMacHIndu($data["adresse_mac_h_indu"]);
            $lesPC->setTagHIndu($data["tag_h_indu"]);
            $lesPC->setMicrosoftHIndu(($data["microsoft_h_indu"]));
            $lesPC->setStationAcceuilHIndu($data["station_acceuil_h_indu"]);
            $lesPC->setMoniteurHIndu($data["moniteur_h_indu"]);
            $lesPC->setClavierSourisHIndu($data["clavier_souris_h_indu"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_industries',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_industries/modif_hiolle_industries.html.twig', [
            'LesOrdiHiolleIndustries' => $lesPC,
        ]);
    }

    //Supprimer
    /**
     * @Route("/sup_hiolle_industries/{id}", name="sup_hiolle_industries")
     *
     */
    public function sup_hiolle_industries(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesOrdinateurs=$em->getRepository(LesOrdiHiolleIndustries::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesOrdinateurs);
        $entityManager->flush();

        return  $this->redirectToRoute("hiolle_industries",[], Response::HTTP_SEE_OTHER);
    }

    //Recherche
    /**
     * @Route("/recherche_hiolle_industries", name="recherche_hiolle_industries")
     */
    ///Affichage par cathegorie dans la barre de recherche
    public function recherche_hiolle_industries(Request $request)
    {
        $LesOrdi = new LesOrdiHiolleIndustries();
        $form = $this->createForm(RechercheHiolleIndustriesType::class, $LesOrdi);
        $form->handleRequest($request);
        //Initialement le tableau des données est vides
        //c.a.d on affiche les données que lorsque l'utilisateur clique sur le bouton rechercher
        $lesPC = [];

        if ($form->isSubmitted() && $form->isValid()) {
            //On récupère le nom de la station  tapé dans le formulaire

            $user = $LesOrdi->getUtilisateurHIndu();

            if ($user != "") {
                $lesPC = $this->getDoctrine()->getRepository(LesOrdiHiolleIndustries::class)->findBy(['utilisateur_h_indu' => $user]);
            } else {
                //si si aucun non n'est fourni on affiche tous les données
                $lesPC = $this->getDoctrine()->getRepository(LesOrdiHiolleIndustries::class)->findAll();
            }
        }
        return $this->render('hiolle_industries/recherche_hiolle_industries.html.twig', [
            'form' => $form->createView(),
            'LesOrdiHiolleIndustries' => $lesPC
        ]);
    }

    /////////
    //Trier//
    /////////
    /**
     * @Route("/trier_nom_h_indu_asc", name="trier_nom_h_indu_asc")
     *
     */
    public function trier_nom_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['nom_station_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_nom_h_indu_desc", name="trier_nom_h_indu_desc")
     *
     */
    public function trier_nom_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['nom_station_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_user_h_indu_asc", name="trier_user_h_indu_asc")
     *
     */
    public function trier_user_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['utilisateur_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_user_h_indu_desc", name="trier_user_h_indu_desc")
     *
     */
    public function trier_user_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['utilisateur_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_marque_h_indu_asc", name="trier_marque_h_indu_asc")
     *
     */
    public function trier_marque_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['marque_station_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_marque_h_indu_desc", name="trier_marque_h_indu_desc")
     *
     */
    public function trier_marque_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['marque_station_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_mac_h_indu_asc", name="trier_mac_h_indu_asc")
     *
     */
    public function trier_mac_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['adresse_mac_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_mac_h_indu_desc", name="trier_mac_h_indu_desc")
     *
     */
    public function trier_mac_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['adresse_mac_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_tag_h_indu_asc", name="trier_tag_h_indu_asc")
     *
     */
    public function trier_tag_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['tag_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_tag_h_indu_desc", name="trier_tag_h_indu_desc")
     *
     */
    public function trier_tag_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['tag_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_micro_h_indu_asc", name="trier_micro_h_indu_asc")
     *
     */
    public function trier_micro_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['microsoft_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_micro_h_indu_desc", name="trier_micro_h_indu_desc")
     *
     */
    public function trier_micro_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['microsoft_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_station_h_indu_asc", name="trier_station_h_indu_asc")
     *
     */
    public function trier_station_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['station_acceuil_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_station_h_indu_desc", name="trier_station_h_indu_desc")
     *
     */
    public function trier_station_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['station_acceuil_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_moniteur_h_indu_asc", name="trier_moniteur_h_indu_asc")
     *
     */
    public function trier_moniteur_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['moniteur_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_moniteur_h_indu_desc", name="trier_moniteur_h_indu_desc")
     *
     */
    public function trier_moniteur_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['moniteur_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_CS_h_indu_asc", name="trier_CS_h_indu_asc")
     *
     */
    public function trier_CS_h_indu_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['clavier_souris_h_indu' => 'ASC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_CS_h_indu_desc", name="trier_CS_h_indu_desc")
     *
     */
    public function trier_CS_h_indu_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleIndustries::class)->findBy([],['clavier_souris_h_indu' => 'DESC']);

        return $this->render('hiolle_industries/index.html.twig', [
            'LesOrdiHiolleIndustries' => $lesOrdi
        ]);
    }
}
