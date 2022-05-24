<?php

namespace App\Controller;

use App\Entity\LesOrdinateurs;
use App\Form\PropertySearchType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LesOrdinateursController extends AbstractController
{
    /**
     * @Route("/liste", name="liste")
     */
    //Affichage Basique

    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Nom_de_la_station' => 'ASC']);

        //Ajout
        $lesPC = new LesOrdinateurs();
        $msg = "";

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesPC->setNomDeLaStation($data["nom_de_la_station"]);
            $lesPC->setUtilisateurHabituel($data["utilisateur_habituel"]);
            $lesPC->setMarqueDeLaStation($data["marque_de_la_station"]);
            $lesPC->setAdresseMac($data["adresse_mac"]);
            $lesPC->setTAG($data["tag"]);
            $lesPC->setMicrosoftOffice(($data["microsoft_office"]));
            $lesPC->setStationAcceuil($data["station_acceuil"]);
            $lesPC->setMoniteur($data["moniteur"]);
            $lesPC->setClavierSouris($data["clavier_souris"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            $msg = "Ajoutée avec succés";
            return $this->redirectToRoute('liste',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    //Ajout - PAS UTILISE
    /**
     * @Route("/ajout_amodiag", name="ajout_amodiag")
     */
    public function ajout_amodiag(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findAll();

        $lesPC = new LesOrdinateurs();
        $msg = "";

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesPC->setNomDeLaStation($data["nom_de_la_station"]);
            $lesPC->setUtilisateurHabituel($data["utilisateur_habituel"]);
            $lesPC->setMarqueDeLaStation($data["marque_de_la_station"]);
            $lesPC->setAdresseMac($data["adresse_mac"]);
            $lesPC->setTAG($data["tag"]);
            $lesPC->setMicrosoftOffice(($data["microsoft_office"]));
            $lesPC->setStationAcceuil($data["station_acceuil"]);
            $lesPC->setMoniteur($data["moniteur"]);
            $lesPC->setClavierSouris($data["clavier_souris"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            $msg = "Ajoutée avec succés";
            return $this->redirectToRoute('liste',[], Response::HTTP_SEE_OTHER);
        }
        return $this->render('amodiag/ajout_amodiag.html.twig', [
            "msg"=>$msg,
            "lesOrinateurs" => $lesOrdinateurs
        ]);
    }

    //Modifier
    /**
     * @Route("/modif_liste/{id}", name="modif_liste")
     *
     */
    public function modif_liste(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $lesPC = $entityManager->getRepository(LesOrdinateurs::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if (count($data) > 0) {
            $lesPC->setNomDeLaStation($data["nom_de_la_station"]);
            $lesPC->setUtilisateurHabituel($data["utilisateur_habituel"]);
            $lesPC->setMarqueDeLaStation($data["marque_de_la_station"]);
            $lesPC->setAdresseMac($data["adresse_mac"]);
            $lesPC->setTAG($data["tag"]);
            $lesPC->setMicrosoftOffice(($data["microsoft_office"]));
            $lesPC->setStationAcceuil($data["station_acceuil"]);
            $lesPC->setMoniteur($data["moniteur"]);
            $lesPC->setClavierSouris($data["clavier_souris"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            return $this->redirectToRoute('liste',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('amodiag/modif_liste.html.twig', [
            'lesOrdinateurs' => $lesPC,
        ]);
    }


    //Supprimer
    /**
     * @Route("/sup_liste/{id}", name="sup_liste")
     *
     */
    public function sup_liste(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesOrdinateurs=$em->getRepository(LesOrdinateurs::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesOrdinateurs);
        $entityManager->flush();

        return  $this->redirectToRoute("liste",[], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/recherche_amodiag", name="recherche_amodiag")
     */
    ///Affichage par cathegorie dans la barre de recherche
    public function recherche_amodiag(Request $request){
        $LesOrdinateurs = new LesOrdinateurs();
        $form = $this->createForm(PropertySearchType::class,$LesOrdinateurs);
        $form->handleRequest($request);
        //Initialement le tableau des données est vides
        //c.a.d on affiche les données que lorsque l'utilisateur clique sur le bouton rechercher
        $lesPC=[];

        if($form->isSubmitted() && $form->isValid()){
            //On récupère le nom de la station  tapé dans le formulaire
            $nom = $LesOrdinateurs->getNomDeLaStation();
            $user = $LesOrdinateurs->getUtilisateurHabituel();
            $marque = $LesOrdinateurs->getMarqueDeLaStation();
            $mac = $LesOrdinateurs->getAdresseMac();
            $tag = $LesOrdinateurs->getTAG();
            $micro = $LesOrdinateurs->getMicrosoftOffice();
            $station = $LesOrdinateurs->getStationAcceuil();
            $moniteur = $LesOrdinateurs->getMoniteur();
            $cv = $LesOrdinateurs->getClavierSouris();

            /*if($nom!=""){
                //si on a fourni un nom, on affiche tous les articles ayant ce nom
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Nom_de_la_station' => $nom]);
            }*/
            if ($user!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Utilisateur_habituel' => $user]);
            }/*
            elseif ($marque!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Marque_de_la_station' => $marque]);
            }
            elseif ($mac!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Adresse_Mac' => $mac]);
            }
            elseif ($tag!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['TAG' => $tag]);
            }
            elseif ($micro!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Microsoft_Office' => $micro]);
            }
            elseif ($station!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Station_Acceuil' => $station]);
            }
            elseif ($moniteur!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Moniteur' => $moniteur]);
            }
            elseif ($cv!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Clavier_Souris' => $cv]);
            }*/
            else{
                //si si aucun non n'est fourni on affiche tous les données
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findAll();
            }
        }

        /*Affichage par recherche de mot complet
        if($form->isSubmitted() && $form->isValid()){
            //On récupère le nom de la station  tapé dans le formulaire
            $nom = $LesOrdinateurs->getNomDeLaStation();
            if($nom!=""){
                //si on a fourni un nom, on affiche tous les articles ayant ce nom
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Nom_de_la_station' => $nom]);
            }
            else{
                //si si aucun non n'est fourni on affiche tous les données
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findAll();
            }
        }*/

        /* Affichage par recherche par liste déroulente
        if($form->isSubmitted() && $form->isValid()){
            $marque = $LesOrdinateurs->getMarqueDeLaStation();
            if($marque!=""){
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findBy(['Marque_de_la_station' => $marque]);
            }
            else{
                //si si aucun non n'est fourni on affiche tous les données
                $lesPC= $this->getDoctrine()->getRepository(LesOrdinateurs::class)->findAll();
            }
        }
        */
        return $this->render('amodiag/recherche_amodiag.html.twig', [
            'form'=>$form->createView(),
            'lesOrdinateurs' => $lesPC

        ]);
    }

    /////////
    //Trier//
    /////////
    /**
     * @Route("/trier_nom_asc", name="trier_nom_asc")
     *
     */
    public function trier_nom_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Nom_de_la_station' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_nom_desc", name="trier_nom_desc")
     *
     */
    public function trier_nom_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Nom_de_la_station' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    /**
     * @Route("/trier_user_asc", name="trier_user_asc")
     *
     */
    public function trier_user_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Utilisateur_habituel' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_user_desc", name="trier_user_desc")
     *
     */
    public function trier_user_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Utilisateur_habituel' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    /**
     * @Route("/trier_marque_asc", name="trier_marque_asc")
     *
     */
    public function trier_marque_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Marque_de_la_station' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_marque_desc", name="trier_marque_desc")
     *
     */
    public function trier_marque_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Marque_de_la_station' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    /**
     * @Route("/trier_mac_asc", name="trier_mac_asc")
     *
     */
    public function trier_mac_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Adresse_Mac' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_mac_desc", name="trier_mac_desc")
     *
     */
    public function trier_mac_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Adresse_Mac' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    /**
     * @Route("/trier_tag_asc", name="trier_tag_asc")
     *
     */
    public function trier_tag_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['TAG' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_tag_desc", name="trier_tag_desc")
     *
     */
    public function trier_tag_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['TAG' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    /**
     * @Route("/trier_micro_asc", name="trier_micro_asc")
     *
     */
    public function trier_micro_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Microsoft_Office' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_micro_desc", name="trier_micro_desc")
     *
     */
    public function trier_micro_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Microsoft_Office' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    /**
     * @Route("/trier_station_asc", name="trier_station_asc")
     *
     */
    public function trier_station_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Station_Acceuil' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_station_desc", name="trier_station_desc")
     *
     */
    public function trier_station_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Station_Acceuil' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    /**
     * @Route("/trier_moniteur_asc", name="trier_moniteur_asc")
     *
     */
    public function trier_moniteur_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Moniteur' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_moniteur_desc", name="trier_moniteur_desc")
     *
     */
    public function trier_moniteur_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Moniteur' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }

    /**
     * @Route("/trier_CS_asc", name="trier_CS_asc")
     *
     */
    public function trier_CS_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Clavier_Souris' => 'ASC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
    /**
     * @Route("/trier_CS_desc", name="trier_CS_desc")
     *
     */
    public function trier_CS_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdinateurs = $entityManager->getRepository(LesOrdinateurs::class)->findBy([],['Clavier_Souris' => 'DESC']);

        return $this->render('amodiag/index.html.twig', [
            'lesOrdinateurs' => $lesOrdinateurs
        ]);
    }
}
