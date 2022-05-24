<?php

namespace App\Controller;

use App\Entity\AdresseMacHiolleTech;
use App\Entity\LesOrdiHiolleTechnologies;
use App\Entity\LicenceOnlineHiolleTech;
use App\Entity\OfficeLicenceHTech;
use App\Entity\ProjectLicenceHTech;
use App\Entity\ServeursHiolleTech;
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

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

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
            $lesPC->setStationAcceuilHTech($data["station_acceuil_h_tech"]);
            $lesPC->setClavierSourisHTech($data["clavier_souris_h_tech"]);
            $lesPC->setIPLANHTech($data["iplan_h_tech"]);
            $lesPC->setIPWLANHTech($data["ipwlan_h_tech"]);
            $lesPC->setProduitSNHTech($data["produit_sn_h_tech"]);
            $lesPC->setAdresseMac2HTech($data["adresse_mac_2_h_tech"]);
            $lesPC->setClipperLocalHTech($data["clipper_local_h_tech"]);
            $lesPC->setClipperTSEHTech($data["clipper_tse_h_tech"]);
            $lesPC->setCleClipHTech($data["clip_h_tech"]);
            $lesPC->setObservationHTech($data["observation_h_tech"]);
            $lesPC->setMdpAdminLocalHTech($data["mdp_admin_local_h_tech"]);
            $lesPC->setServiceHTech($data["service_h_tech"]);
            $lesPC->setPrixAchatHTech($data["prix_achat_h_tech"]);
            $lesPC->setSilog($data["silog"]);
            $lesPC->setNumBureauHTech($data["num_bureau_h_tech"]);
            $lesPC->setRefHTech($data["ref_h_tech"]);
            $lesPC->setProcesseurHTech($data["processeur_h_tech"]);
            $lesPC->setMemoireHTech($data["memoire_h_tech"]);
            $lesPC->setDisqueDurHTech($data["disque_dur_h_tech"]);
            $lesPC->setDateAchat($data["date_achat"]);
            $lesPC->setGarantieHTech($data["garantie_h_tech"]);
            $lesPC->setFoPHTech($data["fo_p_h_tech"]);
            $lesPC->setEcranHTech($data["ecran_h_tech"]);
            $lesPC->setSystExploiHTech($data["syst_exploi_h_tech"]);
            $lesPC->setExpressServiceCodeHTech($data["express_service_code_h_tech"]);
            $lesPC->setCarepackHPHTech($data["carepack_hp_h_tech"]);
            $lesPC->setCarepackDate($data["carepack_date"]);
            $lesPC->setProductHTech($data["product_h_tech"]);
            $lesPC->setNumSerieHTech($data["num_serie_h_tech"]);
            $lesPC->setIsoHTech($data["iso_h_tech"]);
            $lesPC->setImprimanteHTech($data["imprimante_h_tech"]);
            $lesPC->setReferenceHTech($data["reference_h_tech"]);
            $lesPC->setSacocheHTech($data["sacoche_h_tech"]);
            $lesPC->setPackOfficeHTech($data["pack_office_h_tech"]);
            $lesPC->setAntivirusHTech($data["antivirus_h_tech"]);
            $lesPC->setScanHTech($data["scan_h_tech"]);
            $lesPC->setSilogHTech($data["silog_h_tech"]);
            $lesPC->setAutocadHTech($data["autocad_h_tech"]);
            $lesPC->setAutresHTech($data["autres_h_tech"]);
            $lesPC->setMSprojectHTech($data["msproject_h_tech"]);
            $lesPC->setIdentifieHTech($data["identifie_h_tech"]);
            $lesPC->setScriptDemarHTech($data["script_demar_h_tech"]);
            $lesPC->setRobot($data["robot"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/index.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesOrdi,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices
        ]);
    }

    /**
     * @Route("/form_ajout_serv_h_tech", name="form_ajout_serv_h_tech")
     */
    public function form_ajout_serv_h_tech(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesServeurs = new ServeursHiolleTech();
            // recuperation des donnees envoyer en post
        $data2 = $request->request->all();

        if(count($data2)) { //ajouter
            $lesServeurs->setNomServHTech($data2["nom_serv_h_tech"]);
            $lesServeurs->setSalleServHTech($data2["salle_serv_h_tech"]);
            $lesServeurs->setIpServHTech($data2["ip_serv_h_tech"]);
            $lesServeurs->setDcServHTech($data2["dc_serv_h_tech"]);
            $lesServeurs->setRoleServHTech($data2["role_serv_h_tech"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesServeurs);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/ajout/form_ajout_serv_h_tech.html.twig', [
            'ServeursHiolleTech' => $lesServ
        ]);
    }

    /**
     * @Route("/form_ajout_adresse_mac_h_tech", name="form_ajout_adresse_mac_h_tech")
     */
    public function form_ajout_adresse_mac_h_tech(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        $lesAdr = new AdresseMacHiolleTech();
        // recuperation des donnees envoyer en post
        $data3 = $request->request->all();

        if(count($data3)) { //ajouter
            $lesAdr->setIpAdrHTech($data3["ip_adr_h_tech"]);
            $lesAdr->setIpCetamHTech($data3["ip_cetam_h_tech"]);
            $lesAdr->setMacAdrHTech($data3["mac_adr_h_tech"]);
            $lesAdr->setUtilisateurAdrHTech($data3["utilisateur_adr_h_tech"]);
            $lesAdr->setHiolleAdrHTech($data3["hiolle_adr_h_tech"]);
            $lesAdr->setCetamAdrHTech($data3["cetam_adr_h_tech"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesAdr);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/ajout/form_ajout_adresse_h_tech.html.twig', [
            'AdresseMacHiolleTech' => $lesAdresses
        ]);
    }

    /**
     * @Route("/form_ajout_licence_h_tech", name="form_ajout_licence_h_tech")
     */
    public function form_ajout_licence_h_tech(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $LesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['produit_licence_h_tech' => 'ASC']);

        $licence = new LicenceOnlineHiolleTech();
        // recuperation des donnees envoyer en post
        $data4 = $request->request->all();

        if(count($data4)) { //ajouter
            $licence->setProduitLicenceHTech($data4["produit_licence_h_tech"]);
            $licence->setPosteLicenceHTech($data4["poste_licence_h_tech"]);
            $licence->setUtilisateurLicenceHTech($data4["utilisateur_licence_h_tech"]);
            $licence->setCodeLicenceHTech($data4["code_licence_h_tech"]);
            $licence->setDateLicenceHTech($data4["date_licence_h_tech"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($licence);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/ajout/form_ajout_licence_h_tech.html.twig', [
            'LicenceOnlineHiolleTech' => $LesLicences
        ]);
    }

    /**
     * @Route("/form_ajout_licence_project_h_tech", name="form_ajout_licence_project_h_tech")
     */
    public function form_ajout_licence_project_h_tech(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $LesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);

        $proj = new ProjectLicenceHTech();
        // recuperation des donnees envoyer en post
        $data5 = $request->request->all();

        if(count($data5)) { //ajouter
            $proj->setPostePLHTech($data5["poste_p_l_h_tech"]);
            $proj->setUtilisateurPLHTech($data5["utilisateur_p_l_h_tech"]);
            $proj->setLicencePLHTech($data5["licence_p_l_h_tech"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($proj);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/ajout/form_ajout_licence_project_h_tech.html.twig', [
            'ProjectLicenceHTech' => $LesProjects
        ]);
    }

    /**
     * @Route("/form_ajout_licence_office_h_tech", name="form_ajout_licence_office_h_tech")
     */
    public function form_ajout_licence_office_h_tech(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $LesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        $off = new OfficeLicenceHTech();
        // recuperation des donnees envoyer en post
        $data6 = $request->request->all();

        if(count($data6)) { //ajouter
            $off->setPosteOLHTech($data6["poste_o_l_h_tech"]);
            $off->setUtilisateurOLHTech($data6["utilisateur_o_l_h_tech"]);
            $off->setTypeOLHTech($data6["type_o_l_h_tech"]);
            $off->setLicenceOLHTech($data6["licence_o_l_h_tech"]);
            // envoie des donnees a la base de donnees
            $entityManager->persist($off);
            $entityManager->flush();

            return $this->redirectToRoute('form_ajout_licence_office_h_tech', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/ajout/form_ajout_licence_office_h_tech.html.twig', [
            'OfficeLicenceHTech' => $LesOffices
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

        if(count($data)) {
            $lesPC->setNomStationHTech($data["nom_station_h_tech"]);
            $lesPC->setUtilisateurHTech($data["utilisateur_h_tech"]);
            $lesPC->setMarqueStationHTech($data["marque_station_h_tech"]);
            $lesPC->setAdresseMacHTech($data["adresse_mac_h_tech"]);
            $lesPC->setTagHTech($data["tag_h_tech"]);
            $lesPC->setStationAcceuilHTech($data["station_acceuil_h_tech"]);
            $lesPC->setClavierSourisHTech($data["clavier_souris_h_tech"]);
            $lesPC->setIPLANHTech($data["iplan_h_tech"]);
            $lesPC->setIPWLANHTech($data["ipwlan_h_tech"]);
            $lesPC->setProduitSNHTech($data["produit_sn_h_tech"]);
            $lesPC->setAdresseMac2HTech($data["adresse_mac_2_h_tech"]);
            $lesPC->setClipperLocalHTech($data["clipper_local_h_tech"]);
            $lesPC->setClipperTSEHTech($data["clipper_tse_h_tech"]);
            $lesPC->setCleClipHTech($data["clip_h_tech"]);
            $lesPC->setObservationHTech($data["observation_h_tech"]);
            $lesPC->setMdpAdminLocalHTech($data["mdp_admin_local_h_tech"]);
            $lesPC->setServiceHTech($data["service_h_tech"]);
            $lesPC->setPrixAchatHTech($data["prix_achat_h_tech"]);
            $lesPC->setSilog($data["silog"]);
            $lesPC->setNumBureauHTech($data["num_bureau_h_tech"]);
            $lesPC->setRefHTech($data["ref_h_tech"]);
            $lesPC->setProcesseurHTech($data["processeur_h_tech"]);
            $lesPC->setMemoireHTech($data["memoire_h_tech"]);
            $lesPC->setDisqueDurHTech($data["disque_dur_h_tech"]);
            $lesPC->setDateAchat($data["date_achat"]);
            $lesPC->setGarantieHTech($data["garantie_h_tech"]);
            $lesPC->setFoPHTech($data["fo_p_h_tech"]);
            $lesPC->setEcranHTech($data["ecran_h_tech"]);
            $lesPC->setSystExploiHTech($data["syst_exploi_h_tech"]);
            $lesPC->setExpressServiceCodeHTech($data["express_service_code_h_tech"]);
            $lesPC->setCarepackHPHTech($data["carepack_hp_h_tech"]);
            $lesPC->setCarepackDate($data["carepack_date"]);
            $lesPC->setProductHTech($data["product_h_tech"]);
            $lesPC->setNumSerieHTech($data["num_serie_h_tech"]);
            $lesPC->setIsoHTech($data["iso_h_tech"]);
            $lesPC->setImprimanteHTech($data["imprimante_h_tech"]);
            $lesPC->setReferenceHTech($data["reference_h_tech"]);
            $lesPC->setSacocheHTech($data["sacoche_h_tech"]);
            $lesPC->setPackOfficeHTech($data["pack_office_h_tech"]);
            $lesPC->setAntivirusHTech($data["antivirus_h_tech"]);
            $lesPC->setScanHTech($data["scan_h_tech"]);
            $lesPC->setSilogHTech($data["silog_h_tech"]);
            $lesPC->setAutocadHTech($data["autocad_h_tech"]);
            $lesPC->setAutresHTech($data["autres_h_tech"]);
            $lesPC->setMSprojectHTech($data["msproject_h_tech"]);
            $lesPC->setIdentifieHTech($data["identifie_h_tech"]);
            $lesPC->setScriptDemarHTech($data["script_demar_h_tech"]);
            $lesPC->setRobot($data["robot"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesPC);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/modif/modif_hiolle_technologies.html.twig', [
            'LesOrdiHiolleTechnologies' => $lesPC,
        ]);
    }

    /**
     * @Route("/modif_serv_h_tech/{id}", name="modif_serv_h_tech")
     *
     */
    public function modif_serv_h_tech(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $lesServeurs = $entityManager->getRepository(ServeursHiolleTech::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data = $request->request->all();

        if(count($data)) {
            $lesServeurs->setNomServHTech($data["nom_serv_h_tech"]);
            $lesServeurs->setSalleServHTech($data["salle_serv_h_tech"]);
            $lesServeurs->setIpServHTech($data["ip_serv_h_tech"]);
            $lesServeurs->setDcServHTech($data["dc_serv_h_tech"]);
            $lesServeurs->setRoleServHTech($data["role_serv_h_tech"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesServeurs);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/modif/modif_serv_h_tech.html.twig', [
            'ServeursHiolleTech' => $lesServeurs,
        ]);
    }

    /**
     * @Route("/modif_adresse_h_tech/{id}", name="modif_adresse_h_tech")
     *
     */
    public function modif_adresse_h_tech(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $lesAdr = $entityManager->getRepository(AdresseMacHiolleTech::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data3 = $request->request->all();

        if(count($data3)) {
            $lesAdr->setIpAdrHTech($data3["ip_adr_h_tech"]);
            $lesAdr->setIpCetamHTech($data3["ip_cetam_h_tech"]);
            $lesAdr->setMacAdrHTech($data3["mac_adr_h_tech"]);
            $lesAdr->setUtilisateurAdrHTech($data3["utilisateur_adr_h_tech"]);
            $lesAdr->setHiolleAdrHTech($data3["hiolle_adr_h_tech"]);
            $lesAdr->setCetamAdrHTech($data3["cetam_adr_h_tech"]);

            // envoie des donnees a la base de donnees
            $entityManager->persist($lesAdr);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/modif/modif_adresse_mac_h_tech.html.twig', [
            'AdresseMacHiolleTech' => $lesAdr,
        ]);
    }

    /**
     * @Route("/modif_licence_h_tech/{id}", name="modif_licence_h_tech")
     *
     */
    public function modif_licence_h_tech(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $licence = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data4 = $request->request->all();

        if(count($data4)) { //ajouter
            $licence->setProduitLicenceHTech($data4["produit_licence_h_tech"]);
            $licence->setPosteLicenceHTech($data4["poste_licence_h_tech"]);
            $licence->setUtilisateurLicenceHTech($data4["utilisateur_licence_h_tech"]);
            $licence->setCodeLicenceHTech($data4["code_licence_h_tech"]);
            $licence->setDateLicenceHTech($data4["date_licence_h_tech"]);


            // envoie des donnees a la base de donnees
            $entityManager->persist($licence);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/modif/modif_licence_h_tech.html.twig', [
            'LicenceOnlineHiolleTech' => $licence,
        ]);
    }

    /**
     * @Route("/modif_licence_project_h_tech/{id}", name="modif_licence_project_h_tech")
     *
     */
    public function modif_licence_project_h_tech(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $proj = $entityManager->getRepository(ProjectLicenceHTech::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data5 = $request->request->all();

        if(count($data5)) { //ajouter
            $proj->setPostePLHTech($data5["poste_p_l_h_tech"]);
            $proj->setUtilisateurPLHTech($data5["utilisateur_p_l_h_tech"]);
            $proj->setLicencePLHTech($data5["licence_p_l_h_tech"]);
            // envoie des donnees a la base de donnees
            $entityManager->persist($proj);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/modif/modif_licence_project_h_tech.html.twig', [
            'ProjectLicenceHTech' => $proj,
        ]);
    }

    /**
     * @Route("/modif_licence_office_h_tech/{id}", name="modif_licence_office_h_tech")
     *
     */
    public function modif_licence_office_h_tech(ManagerRegistry $doctrine, Request $request, $id): Response {

        $entityManager = $doctrine->getManager();

        // recuperation des informations a modifier
        $off = $entityManager->getRepository(OfficeLicenceHTech::class)->findOneBy(["id"=>$id]);

        // recuperation des donnees envoyer en post
        $data6 = $request->request->all();

        if(count($data6)) { //ajouter
            $off->setPosteOLHTech($data6["poste_o_l_h_tech"]);
            $off->setUtilisateurOLHTech($data6["utilisateur_o_l_h_tech"]);
            $off->setTypeOLHTech($data6["type_o_l_h_tech"]);
            $off->setLicenceOLHTech($data6["licence_o_l_h_tech"]);


            // envoie des donnees a la base de donnees
            $entityManager->persist($off);
            $entityManager->flush();

            return $this->redirectToRoute('hiolle_technologies',[], Response::HTTP_SEE_OTHER);
        }

        return $this->render('hiolle_technologies/modif/modif_licence_office_h_tech.html.twig', [
            'OfficeLicenceHTech' => $off,
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
     * @Route("/sup_serv_h_tech/{id}", name="sup_serv_h_tech")
     *
     */
    public function sup_serv_h_tech(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesServ=$em->getRepository(ServeursHiolleTech::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesServ);
        $entityManager->flush();

        return  $this->redirectToRoute("hiolle_technologies",[], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/sup_adresse_mac_h_tech/{id}", name="sup_adresse_mac_h_tech")
     *
     */
    public function sup_adresse_mac_h_tech(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesAdresses=$em->getRepository(AdresseMacHiolleTech::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesAdresses);
        $entityManager->flush();

        return  $this->redirectToRoute("hiolle_technologies",[], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/sup_licence_h_tech/{id}", name="sup_licence_h_tech")
     *
     */
    public function sup_licence_h_tech(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesLicences=$em->getRepository(LicenceOnlineHiolleTech::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesLicences);
        $entityManager->flush();

        return  $this->redirectToRoute("hiolle_technologies",[], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/sup_licence_project_h_tech/{id}", name="sup_licence_project_h_tech")
     *
     */
    public function sup_licence_project_h_tech(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesProjects=$em->getRepository(ProjectLicenceHTech::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesProjects);
        $entityManager->flush();

        return  $this->redirectToRoute("hiolle_technologies",[], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/sup_licence_office_h_tech/{id}", name="sup_licence_office_h_tech")
     *
     */
    public function sup_licence_office_h_tech(ManagerRegistry $doctrine, $id, EntityManagerInterface $entityManager): Response
    {
        $em = $doctrine->getManager();

        // recuperation des informations à supprimer
        $lesOffices=$em->getRepository(OfficeLicenceHTech::class)->findOneBy(['id'=>$id]);

        $entityManager->remove($lesOffices);
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

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'LesOrdiHiolleTechnologies' => $lesOrdi,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses
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

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'LesOrdiHiolleTechnologies' => $lesOrdi,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses
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

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'LesOrdiHiolleTechnologies' => $lesOrdi,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_iplan_h_tech_asc", name="trier_iplan_h_tech_asc")
     *
     */
    public function trier_iplan_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['IPLAN_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_iplan_h_tech_desc", name="trier_iplan_h_tech_desc")
     *
     */
    public function trier_iplan_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['IPLAN_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_robot_asc", name="trier_robot_asc")
     *
     */
    public function trier_robot_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['robot' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_robot_desc", name="trier_robot_desc")
     *
     */
    public function trier_robot_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['robot' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_ipwlan_h_tech_asc", name="trier_ipwlan_h_tech_asc")
     *
     */
    public function trier_ipwlan_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['IPWLAN_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_ipwlan_h_tech_desc", name="trier_ipwlan_h_tech_desc")
     *
     */
    public function trier_ipwlan_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['IPWLAN_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_produit_sn_h_tech_asc", name="trier_produit_sn_h_tech_asc")
     *
     */
    public function trier_produit_sn_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['produitSN_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_produit_sn_h_tech_desc", name="trier_produit_sn_h_tech_desc")
     *
     */
    public function trier_produit_sn_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['produitSN_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_mac_2_h_tech_asc", name="trier_mac_2_h_tech_asc")
     *
     */
    public function trier_mac_2_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['adresse_mac_2_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_mac_2_h_tech_desc", name="trier_mac_2_h_tech_desc")
     *
     */
    public function trier_mac_2_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['adresse_mac_2_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_clipper_local_h_tech_asc", name="trier_clipper_local_h_tech_asc")
     *
     */
    public function trier_clipper_local_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['clipperLocal_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_clipper_local_h_tech_desc", name="trier_clipper_local_h_tech_desc")
     *
     */
    public function trier_clipper_local_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['clipperLocal_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_clipper_tes_h_tech_asc", name="trier_clipper_tes_h_tech_asc")
     *
     */
    public function trier_clipper_tes_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['clipperTSE_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_clipper_tes_h_tech_desc", name="trier_clipper_tes_h_tech_desc")
     *
     */
    public function trier_clipper_tes_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['clipperTSE_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_cle_clip_h_tech_asc", name="trier_cle_clip_h_tech_asc")
     *
     */
    public function trier_cle_clip_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['cleClip_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_cle_clip_h_tech_desc", name="trier_cle_clip_h_tech_desc")
     *
     */
    public function trier_cle_clip_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['cleClip_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_observation_h_tech_asc", name="trier_observation_h_tech_asc")
     *
     */
    public function trier_observation_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['observation_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_observation_h_tech_desc", name="trier_observation_h_tech_desc")
     *
     */
    public function trier_observation_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['observation_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_mdp_admin_local_h_tech_asc", name="trier_mdp_admin_local_h_tech_asc")
     *
     */
    public function trier_mdp_admin_local_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['mdpAdminLocal_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_mdp_admin_local_h_tech_desc", name="trier_mdp_admin_local_h_tech_desc")
     *
     */
    public function trier_mdp_admin_local_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['mdpAdminLocal_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_service_h_tech_asc", name="trier_service_h_tech_asc")
     *
     */
    public function trier_service_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['service_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_service_h_tech_desc", name="trier_service_h_tech_desc")
     *
     */
    public function trier_service_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['service_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_prix_achat_h_tech_asc", name="trier_prix_achat_h_tech_asc")
     *
     */
    public function trier_prix_achat_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['prixAchat_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_prix_achat_h_tech_desc", name="trier_prix_achat_h_tech_desc")
     *
     */
    public function trier_prix_achat_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['prixAchat_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_silog_asc", name="trier_silog_asc")
     *
     */
    public function trier_silog_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['silog' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_silog_desc", name="trier_silog_desc")
     *
     */
    public function trier_silog_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['silog' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_num_bureau_h_tech_asc", name="trier_num_bureau_h_tech_asc")
     *
     */
    public function trier_num_bureau_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['numBureau_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_num_bureau_h_tech_desc", name="trier_num_bureau_h_tech_desc")
     *
     */
    public function trier_num_bureau_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['numBureau_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_ref_h_tech_asc", name="trier_ref_h_tech_asc")
     *
     */
    public function trier_ref_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['ref_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_ref_h_tech_desc", name="trier_ref_h_tech_desc")
     *
     */
    public function trier_ref_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['ref_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_processeur_h_tech_asc", name="trier_processeur_h_tech_asc")
     *
     */
    public function trier_processeur_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['processeur_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_processeur_h_tech_desc", name="trier_processeur_h_tech_desc")
     *
     */
    public function trier_processeur_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['processeur_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_memoire_h_tech_asc", name="trier_memoire_h_tech_asc")
     *
     */
    public function trier_memoire_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['memoire_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_memoire_h_tech_desc", name="trier_memoire_h_tech_desc")
     *
     */
    public function trier_memoire_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['memoire_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_disque_dur_h_tech_asc", name="trier_disque_dur_h_tech_asc")
     *
     */
    public function trier_disque_dur_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['disqueDur_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_disque_dur_h_tech_desc", name="trier_disque_dur_h_tech_desc")
     *
     */
    public function trier_disque_dur_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['disqueDur_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_date_achat_h_tech_asc", name="trier_date_achat_h_tech_asc")
     *
     */
    public function trier_date_achat_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['dateAchat_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_date_achat_h_tech_desc", name="trier_date_achat_h_tech_desc")
     *
     */
    public function trier_date_achat_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['dateAchat_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_garantie_h_tech_asc", name="trier_garantie_h_tech_asc")
     *
     */
    public function trier_garantie_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['garantie_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_garantie_h_tech_desc", name="trier_garantie_h_tech_desc")
     *
     */
    public function trier_garantie_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['garantie_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_fo_p_h_tech_asc", name="trier_fo_p_h_tech_asc")
     *
     */
    public function trier_fo_p_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['FoP_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_fo_p_h_tech_desc", name="trier_fo_p_h_tech_desc")
     *
     */
    public function trier_fo_p_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['FoP_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_ecran_h_tech_asc", name="trier_ecran_h_tech_asc")
     *
     */
    public function trier_ecran_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['ecran_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_ecran_h_tech_desc", name="trier_ecran_h_tech_desc")
     *
     */
    public function trier_ecran_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['ecran_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_syst_exploi_h_tech_asc", name="trier_syst_exploi_h_tech_asc")
     *
     */
    public function trier_syst_exploi_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['systExploi_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_syst_exploi_h_tech_desc", name="trier_syst_exploi_h_tech_desc")
     *
     */
    public function trier_syst_exploi_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['systExploi_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_express_service_code_h_tech_asc", name="trier_express_service_code_h_tech_asc")
     *
     */
    public function trier_express_service_code_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['expressServiceCode_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_express_service_code_h_tech_desc", name="trier_express_service_code_h_tech_desc")
     *
     */
    public function trier_express_service_code_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['expressServiceCode_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_carepack_hp_h_tech_asc", name="trier_carepack_hp_h_tech_asc")
     *
     */
    public function trier_carepack_hp_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['carepackHP_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_carepack_hp_h_tech_desc", name="trier_carepack_hp_h_tech_desc")
     *
     */
    public function trier_carepack_hp_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['carepackHP_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_carepack_date_asc", name="trier_carepack_date_asc")
     *
     */
    public function trier_carepack_date_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['carepackDate' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_carepack_date_desc", name="trier_carepack_date_desc")
     *
     */
    public function trier_carepack_date_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['carepackDate' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_product_h_tech_asc", name="trier_product_h_tech_asc")
     *
     */
    public function trier_product_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['product_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_product_h_tech_desc", name="trier_product_h_tech_desc")
     *
     */
    public function trier_product_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['product_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_num_serie_h_tech_asc", name="trier_num_serie_h_tech_asc")
     *
     */
    public function trier_num_serie_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['numSerie_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_num_serie_h_tech_desc", name="trier_num_serie_h_tech_desc")
     *
     */
    public function trier_num_serie_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['numSerie_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_iso_h_tech_asc", name="trier_iso_h_tech_asc")
     *
     */
    public function trier_iso_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['iso_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_iso_h_tech_desc", name="trier_iso_h_tech_desc")
     *
     */
    public function trier_iso_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['iso_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_imprimante_h_tech_asc", name="trier_imprimante_h_tech_asc")
     *
     */
    public function trier_imprimante_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['imprimante_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_imprimante_h_tech_desc", name="trier_imprimante_h_tech_desc")
     *
     */
    public function trier_imprimante_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['imprimante_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_reference_h_tech_asc", name="trier_reference_h_tech_asc")
     *
     */
    public function trier_reference_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['reference_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_reference_h_tech_desc", name="trier_reference_h_tech_desc")
     *
     */
    public function trier_reference_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['reference_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
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
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_sacoche_h_tech_asc", name="trier_sacoche_h_tech_asc")
     *
     */
    public function trier_sacoche_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['sacoche_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_sacoche_h_tech_desc", name="trier_sacoche_h_tech_desc")
     *
     */
    public function trier_sacoche_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['sacoche_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_pack_office_h_tech_asc", name="trier_pack_office_h_tech_asc")
     *
     */
    public function trier_pack_office_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['packOffice_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_pack_office_h_tech_desc", name="trier_pack_office_h_tech_desc")
     *
     */
    public function trier_pack_office_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['packOffice_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_antivirus_h_tech_asc", name="trier_antivirus_h_tech_asc")
     *
     */
    public function trier_antivirus_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['antivirus_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);


        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_antivirus_h_tech_desc", name="trier_antivirus_h_tech_desc")
     *
     */
    public function trier_antivirus_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['antivirus_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_scan_h_tech_asc", name="trier_scan_h_tech_asc")
     *
     */
    public function trier_scan_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['scan_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_scan_h_tech_desc", name="trier_scan_h_tech_desc")
     *
     */
    public function trier_scan_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['scan_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_silog_h_tech_asc", name="trier_silog_h_tech_asc")
     *
     */
    public function trier_silog_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['silog_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_silog_h_tech_desc", name="trier_silog_h_tech_desc")
     *
     */
    public function trier_silog_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['silog_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_autocad_h_tech_asc", name="trier_autocad_h_tech_asc")
     *
     */
    public function trier_autocad_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['autocad_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_autocad_h_tech_desc", name="trier_autocad_h_tech_desc")
     *
     */
    public function trier_autocad_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['autocad_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_autres_h_tech_asc", name="trier_autres_h_tech_asc")
     *
     */
    public function trier_autres_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['autres_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_autres_h_tech_desc", name="trier_autres_h_tech_desc")
     *
     */
    public function trier_autres_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['autres_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_msproject_h_tech_asc", name="trier_msproject_h_tech_asc")
     *
     */
    public function trier_msproject_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['MSproject_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_msproject_h_tech_desc", name="trier_msproject_h_tech_desc")
     *
     */
    public function trier_msproject_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['MSproject_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_identifie_h_tech_asc", name="trier_identifie_h_tech_asc")
     *
     */
    public function trier_identifie_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['identifie_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_identifie_h_tech_desc", name="trier_identifie_h_tech_desc")
     *
     */
    public function trier_identifie_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['identifie_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_script_demar_h_tech_asc", name="trier_script_demar_h_tech_asc")
     *
     */
    public function trier_script_demar_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['scriptDemar_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_script_demar_h_tech_desc", name="trier_script_demar_h_tech_desc")
     *
     */
    public function trier_script_demar_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['scriptDemar_h_tech' => 'DESC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    ////////////////////
    ///Les Serveurs/////
    ////////////////////

    /**
     * @Route("/trier_nom_serv_h_tech_asc", name="trier_nom_serv_h_tech_asc")
     *
     */
    public function trier_nom_serv_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_nom_serv_h_tech_desc", name="trier_nom_serv_h_tech_desc")
     *
     */
    public function trier_nom_serv_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'DESC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_salle_serv_h_tech_asc", name="trier_salle_serv_h_tech_asc")
     *
     */
    public function trier_salle_serv_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['salle_serv_h_tech' => 'ASC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_salle_serv_h_tech_desc", name="trier_salle_serv_h_tech_desc")
     *
     */
    public function trier_salle_serv_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['salle_serv_h_tech' => 'DESC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_ip_serv_h_tech_asc", name="trier_ip_serv_h_tech_asc")
     *
     */
    public function trier_ip_serv_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['ip_serv_h_tech' => 'ASC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_ip_serv_h_tech_desc", name="trier_ip_serv_h_tech_desc")
     *
     */
    public function trier_ip_serv_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['ip_serv_h_tech' => 'DESC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_dc_serv_h_tech_asc", name="trier_dc_serv_h_tech_asc")
     *
     */
    public function trier_dc_serv_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['dc_serv_h_tech' => 'ASC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_dc_serv_h_tech_desc", name="trier_dc_serv_h_tech_desc")
     *
     */
    public function trier_dc_serv_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['dc_serv_h_tech' => 'DESC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_role_serv_h_tech_asc", name="trier_role_serv_h_tech_asc")
     *
     */
    public function trier_role_serv_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_role_serv_h_tech_desc", name="trier_role_serv_h_tech_desc")
     *
     */
    public function trier_role_serv_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'DESC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    ////////////////////
    ///Adresse Mac//////
    ////////////////////

    /**
     * @Route("/trier_ip_adr_h_tech_asc", name="trier_ip_adr_h_tech_asc")
     *
     */
    public function trier_ip_adr_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['ip_adr_h_tech' => 'ASC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_ip_adr_h_tech_desc", name="trier_ip_adr_h_tech_desc")
     *
     */
    public function trier_ip_adr_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['ip_adr_h_tech' => 'DESC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_ip_cetam_h_tech_asc", name="trier_ip_cetam_h_tech_asc")
     *
     */
    public function trier_ip_cetam_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['ip_cetam_h_tech' => 'ASC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_ip_cetam_h_tech_desc", name="trier_ip_cetam_h_tech_desc")
     *
     */
    public function trier_ip_cetam_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['ip_cetam_h_tech' => 'DESC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_mac_adr_h_tech_asc", name="trier_mac_adr_h_tech_asc")
     *
     */
    public function trier_mac_adr_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_mac_adr_h_tech_desc", name="trier_mac_adr_h_tech_desc")
     *
     */
    public function trier_mac_adr_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'DESC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_utilisateur_adr_h_tech_asc", name="trier_utilisateur_adr_h_tech_asc")
     *
     */
    public function trier_utilisateur_adr_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['utilisateur_adr_h_tech' => 'ASC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_utilisateur_adr_h_tech_desc", name="trier_utilisateur_adr_h_tech_desc")
     *
     */
    public function trier_utilisateur_adr_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['utilisateur_adr_h_tech' => 'DESC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_hiolle_adr_h_tech_asc", name="trier_hiolle_adr_h_tech_asc")
     *
     */
    public function trier_hiolle_adr_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['hiolle_adr_h_tech' => 'ASC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_hiolle_adr_h_tech_desc", name="trier_hiolle_adr_h_tech_desc")
     *
     */
    public function trier_hiolle_adr_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['hiolle_adr_h_tech' => 'DESC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_cetam_adr_h_tech_asc", name="trier_cetam_adr_h_tech_asc")
     *
     */
    public function trier_cetam_adr_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['cetam_adr_h_tech' => 'ASC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_cetam_adr_h_tech_desc", name="trier_cetam_adr_h_tech_desc")
     *
     */
    public function trier_cetam_adr_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['cetam_adr_h_tech' => 'DESC']);

        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['role_serv_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    ////////////////////
    ///Licence Online///
    ////////////////////

    /**
     * @Route("/trier_produit_licence_h_tech_asc", name="trier_produit_licence_h_tech_asc")
     *
     */
    public function trier_produit_licence_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['produit_licence_h_tech' => 'ASC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_produit_licence_h_tech_desc", name="trier_produit_licence_h_tech_desc")
     *
     */
    public function trier_produit_licence_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['produit_licence_h_tech' => 'DESC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_poste_licence_h_tech_asc", name="trier_poste_licence_h_tech_asc")
     *
     */
    public function trier_poste_licence_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['poste_licence_h_tech' => 'ASC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_poste_licence_h_tech_desc", name="trier_poste_licence_h_tech_desc")
     *
     */
    public function trier_poste_licence_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['poste_licence_h_tech' => 'DESC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_utilisateur_licence_h_tech_asc", name="trier_utilisateur_licence_h_tech_asc")
     *
     */
    public function trier_utilisateur_licence_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['utilisateur_licence_h_tech' => 'ASC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_utilisateur_licence_h_tech_desc", name="trier_utilisateur_licence_h_tech_desc")
     *
     */
    public function trier_utilisateur_licence_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['utilisateur_licence_h_tech' => 'DESC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_code_licence_h_tech_asc", name="trier_code_licence_h_tech_asc")
     *
     */
    public function trier_code_licence_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['code_licence_h_tech' => 'ASC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_code_licence_h_tech_desc", name="trier_code_licence_h_tech_desc")
     *
     */
    public function trier_code_licence_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['code_licence_h_tech' => 'DESC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_date_licence_h_tech_asc", name="trier_date_licence_h_tech_asc")
     *
     */
    public function trier_date_licence_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_date_licence_h_tech_desc", name="trier_date_licence_h_tech_desc")
     *
     */
    public function trier_date_licence_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'DESC']);

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);
        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /////////////
    ///Project///
    /////////////
    /**
     * @Route("/trier_poste_p_l_h_tech_asc", name="trier_poste_p_l_h_tech_asc")
     *
     */
    public function trier_poste_p_l_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'ASC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_poste_p_l_h_tech_desc", name="trier_poste_p_l_h_tech_desc")
     *
     */
    public function trier_poste_p_l_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['poste_p_l_h_tech' => 'DESC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_utilisateur_p_l_h_tech_asc", name="trier_utilisateur_p_l_h_tech_asc")
     *
     */
    public function trier_utilisateur_p_l_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['utilisateur_p_l_h_tech' => 'ASC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_utilisateur_p_l_h_tech_desc", name="trier_utilisateur_p_l_h_tech_desc")
     *
     */
    public function trier_utilisateur_p_l_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['utilisateur_p_l_h_tech' => 'DESC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_licence_p_l_h_tech_asc", name="trier_licence_p_l_h_tech_asc")
     *
     */
    public function trier_licence_p_l_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_licence_p_l_h_tech_desc", name="trier_licence_p_l_h_tech_desc")
     *
     */
    public function trier_licence_p_l_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'DESC']);

        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /////////////
    ///Office////
    /////////////

    /**
     * @Route("/trier_poste_o_l_h_tech_asc", name="trier_poste_o_l_h_tech_asc")
     *
     */
    public function trier_poste_o_l_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'ASC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_poste_o_l_h_tech_desc", name="trier_poste_o_l_h_tech_desc")
     *
     */
    public function trier_poste_o_l_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['poste_o_l_h_tech' => 'DESC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_utilisateur_o_l_h_tech_asc", name="trier_utilisateur_o_l_h_tech_asc")
     *
     */
    public function trier_utilisateur_o_l_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['utilisateur_o_l_h_tech' => 'ASC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_utilisateur_o_l_h_tech_desc", name="trier_utilisateur_o_l_h_tech_desc")
     *
     */
    public function trier_utilisateur_o_l_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['utilisateur_o_l_h_tech' => 'DESC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_type_o_l_h_tech_asc", name="trier_type_o_l_h_tech_asc")
     *
     */
    public function trier_type_o_l_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['type_o_l_h_tech' => 'ASC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_type_o_l_h_tech_desc", name="trier_type_o_l_h_tech_desc")
     *
     */
    public function trier_type_o_l_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['type_o_l_h_tech' => 'DESC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }

    /**
     * @Route("/trier_licence_o_l_h_tech_asc", name="trier_licence_o_l_h_tech_asc")
     *
     */
    public function trier_licence_o_l_h_tech_asc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'ASC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
    /**
     * @Route("/trier_licence_o_l_h_tech_desc", name="trier_licence_o_l_h_tech_desc")
     *
     */
    public function trier_licence_o_l_h_tech_desc(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $lesOffices = $entityManager->getRepository(OfficeLicenceHTech::class)->findBy([],['licence_o_l_h_tech' => 'DESC']);

        $lesProjects = $entityManager->getRepository(ProjectLicenceHTech::class)->findBy([],['licence_p_l_h_tech' => 'ASC']);
        $lesOrdi = $entityManager->getRepository(LesOrdiHiolleTechnologies::class)->findBy([],['nom_station_h_tech' => 'ASC']);
        $lesServ = $entityManager->getRepository(ServeursHiolleTech::class)->findBy([],['nom_serv_h_tech' => 'ASC']);
        $lesAdresses = $entityManager->getRepository(AdresseMacHiolleTech::class)->findBy([],['mac_adr_h_tech' => 'ASC']);
        $lesLicences = $entityManager->getRepository(LicenceOnlineHiolleTech::class)->findBy([],['date_licence_h_tech' => 'ASC']);

        return $this->render('hiolle_technologies/index.html.twig', [
            'LicenceOnlineHiolleTech' =>$lesLicences,
            'ProjectLicenceHTech' =>$lesProjects,
            'OfficeLicenceHTech' =>$lesOffices,
            'ServeursHiolleTech' => $lesServ,
            'AdresseMacHiolleTech' =>$lesAdresses,
            'LesOrdiHiolleTechnologies' => $lesOrdi
        ]);
    }
}
