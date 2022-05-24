<?php

namespace App\Controller;

use App\Entity\NouveauEntrant;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NouveauEntrantController extends AbstractController
{
    /**
     * @Route("/nouveau/entrant", name="nouveau_entrant")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $NouveauEntrant = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['dateArrivee' => 'ASC']);

        //Ajout
        $lesNouv = new NouveauEntrant();
        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) { //ajouter
            $lesNouv->setNomNouv($data["nom_nouv"]);
            $lesNouv->setPrenomNouv($data["prenom_nouv"]);
            $lesNouv->setSocieteNouv($data["societe_nouv"]);
            $lesNouv->setServiceNouv($data["service_nouv"]);
            $lesNouv->setMaterielPCNouv($data["materiel_pc_nouv"]);
            $lesNouv->setLogicielNouv($data["logiciel_nouv"]);
            $lesNouv->setSacocheNouv($data["sacoche_nouv"]);
            $lesNouv->setAutreDemandeNouv($data["autre_demande_nouv"]);
            $lesNouv->setAccesReseauNouv($data["acces_reseau_nouv"]);
            $lesNouv->setAdresseNouv($data["adresse_nouv"]);
            $lesNouv->setDateArrivee($data["date_arrivee"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesNouv);
            $entityManager->flush();

            return $this->redirectToRoute('nouveau_entrant',[], Response::HTTP_SEE_OTHER);
        }
        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $NouveauEntrant,
        ]);
    }

    //Modifier
    /**
     * @Route("/modif_nouveau/{id}", name="modif_nouveau")
     *
     */
    public function modif_nouveau(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findOneBy(["id"=>$id]);
        $msg = "";

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if (count($data) > 0) {
            $lesNouv->setNomNouv($data["nom_nouv"]);
            $lesNouv->setPrenomNouv($data["prenom_nouv"]);
            $lesNouv->setSocieteNouv($data["societe_nouv"]);
            $lesNouv->setServiceNouv($data["service_nouv"]);
            $lesNouv->setMaterielPCNouv($data["materiel_pc_nouv"]);
            $lesNouv->setLogicielNouv($data["logiciel_nouv"]);
            $lesNouv->setSacocheNouv($data["sacoche_nouv"]);
            $lesNouv->setAutreDemandeNouv($data["autre_demande_nouv"]);
            $lesNouv->setAccesReseauNouv($data["acces_reseau_nouv"]);
            $lesNouv->setAdresseNouv($data["adresse_nouv"]);
            $lesNouv->setDateArrivee($data["date_arrivee"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesNouv);
            $entityManager->flush();

            return $this->redirectToRoute('nouveau_entrant',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nouveau_entrant/modif_nouveau.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    //Supprimer
    /**
     * @Route("/sup_nouv/{id}", name="sup_nouv")
     *
     */
    public function sup_nouv(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $NouveauEntrant=$em->getRepository(NouveauEntrant::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($NouveauEntrant);
        $entityManager->flush();

        return  $this->redirectToRoute("nouveau_entrant",[], Response::HTTP_SEE_OTHER);
    }

    //fiche
    /**
     * @Route("/fiche_personne/{id}", name="fiche_personne")
     *
     */
    public function fiche_personne(ManagerRegistry $doctrine, $id): Response {
        $entityManager = $doctrine->getManager();
        // recuperation des informations
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findOneBy(["id"=>$id]);

        return $this->render('nouveau_entrant/fiche_personne.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /////////
    //Trier//
    /////////
    /**
     * @Route("/trier_nom_nouv_asc", name="trier_nom_nouv_asc")
     *
     */
    public function trier_nom_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['nom_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_nom_nouv_desc", name="trier_nom_nouv_desc")
     *
     */
    public function trier_nom_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['nom_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_prenom_nouv_asc", name="trier_prenom_nouv_asc")
     *
     */
    public function trier_prenom_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['prenom_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_prenom_nouv_desc", name="trier_prenom_nouv_desc")
     *
     */
    public function trier_prenom_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['prenom_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_societe_nouv_asc", name="trier_societe_nouv_asc")
     *
     */
    public function trier_societe_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['societe_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_societe_nouv_desc", name="trier_societe_nouv_desc")
     *
     */
    public function trier_societe_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['societe_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_service_nouv_asc", name="trier_service_nouv_asc")
     *
     */
    public function trier_service_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['service_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_service_nouv_desc", name="trier_service_nouv_desc")
     *
     */
    public function trier_service_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['service_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_materiel_pc_nouv_asc", name="trier_materiel_pc_nouv_asc")
     *
     */
    public function trier_materiel_pc_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['materielPC_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_materiel_pc_nouv_desc", name="trier_materiel_pc_nouv_desc")
     *
     */
    public function trier_materiel_pc_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['materielPC_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_logiciel_nouv_asc", name="trier_logiciel_nouv_asc")
     *
     */
    public function trier_logiciel_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['logiciel_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_logiciel_nouv_desc", name="trier_logiciel_nouv_desc")
     *
     */
    public function trier_logiciel_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['logiciel_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_sacoche_nouv_asc", name="trier_sacoche_nouv_asc")
     *
     */
    public function trier_sacoche_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['sacoche_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_sacoche_nouv_desc", name="trier_sacoche_nouv_desc")
     *
     */
    public function trier_sacoche_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['sacoche_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_acces_reseau_nouv_asc", name="trier_acces_reseau_nouv_asc")
     *
     */
    public function trier_acces_reseau_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['accesReseau_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_acces_reseau_nouv_desc", name="trier_acces_reseau_nouv_desc")
     *
     */
    public function trier_acces_reseau_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['accesReseau_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_adresse_nouv_asc", name="trier_adresse_nouv_asc")
     *
     */
    public function trier_adresse_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['adresse_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_adresse_nouv_desc", name="trier_adresse_nouv_desc")
     *
     */
    public function trier_adresse_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['adresse_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_autre_demande_nouv_asc", name="trier_autre_demande_nouv_asc")
     *
     */
    public function trier_autre_demande_nouv_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['autreDemande_nouv' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_autre_demande_nouv_desc", name="trier_autre_demande_nouv_desc")
     *
     */
    public function trier_autre_demande_nouv_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['autreDemande_nouv' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }

    /**
     * @Route("/trier_date_arrivee_asc", name="trier_date_arrivee_asc")
     *
     */
    public function trier_date_arrivee_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['dateArrivee' => 'ASC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
    /**
     * @Route("/trier_date_arrivee_desc", name="trier_date_arrivee_desc")
     *
     */
    public function trier_date_arrivee_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesNouv = $entityManager->getRepository(NouveauEntrant::class)->findBy([],['dateArrivee' => 'DESC']);

        return $this->render('nouveau_entrant/index.html.twig', [
            'NouveauEntrant' => $lesNouv
        ]);
    }
}
