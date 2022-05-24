<?php

namespace App\Entity;

use App\Repository\LesOrdiHiolleTechnologiesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LesOrdiHiolleTechnologiesRepository::class)
 */
class LesOrdiHiolleTechnologies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_station_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $utilisateur_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque_station_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_mac_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tag_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $station_acceuil_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clavier_souris_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $IPLAN_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $IPWLAN_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $produitSN_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_mac_2_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clipperLocal_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clipperTSE_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cleClip_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $observation_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mdpAdminLocal_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $service_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prixAchat_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $silog;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numBureau_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ref_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $processeur_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $memoire_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disqueDur_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateAchat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $garantie_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $FoP_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ecran_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $systExploi_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $expressServiceCode_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carepackHP_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $carepackDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $product_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numSerie_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $iso_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imprimante_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sacoche_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $packOffice_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $antivirus_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $scan_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $silog_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autocad_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autres_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MSproject_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identifie_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $scriptDemar_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $robot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStationHTech(): ?string
    {
        return $this->nom_station_h_tech;
    }

    public function setNomStationHTech(string $nom_station_h_tech): self
    {
        $this->nom_station_h_tech = $nom_station_h_tech;

        return $this;
    }

    public function getUtilisateurHTech(): ?string
    {
        return $this->utilisateur_h_tech;
    }

    public function setUtilisateurHTech(?string $utilisateur_h_tech): self
    {
        $this->utilisateur_h_tech = $utilisateur_h_tech;

        return $this;
    }

    public function getMarqueStationHTech(): ?string
    {
        return $this->marque_station_h_tech;
    }

    public function setMarqueStationHTech(?string $marque_station_h_tech): self
    {
        $this->marque_station_h_tech = $marque_station_h_tech;

        return $this;
    }

    public function getAdresseMacHTech(): ?string
    {
        return $this->adresse_mac_h_tech;
    }

    public function setAdresseMacHTech(?string $adresse_mac_h_tech): self
    {
        $this->adresse_mac_h_tech = $adresse_mac_h_tech;

        return $this;
    }

    public function getTagHTech(): ?string
    {
        return $this->tag_h_tech;
    }

    public function setTagHTech(?string $tag_h_tech): self
    {
        $this->tag_h_tech = $tag_h_tech;

        return $this;
    }

    public function getStationAcceuilHTech(): ?string
    {
        return $this->station_acceuil_h_tech;
    }

    public function setStationAcceuilHTech(?string $station_acceuil_h_tech): self
    {
        $this->station_acceuil_h_tech = $station_acceuil_h_tech;

        return $this;
    }

    public function getClavierSourisHTech(): ?string
    {
        return $this->clavier_souris_h_tech;
    }

    public function setClavierSourisHTech(?string $clavier_souris_h_tech): self
    {
        $this->clavier_souris_h_tech = $clavier_souris_h_tech;

        return $this;
    }

    public function getIPLANHTech(): ?string
    {
        return $this->IPLAN_h_tech;
    }

    public function setIPLANHTech(?string $IPLAN_h_tech): self
    {
        $this->IPLAN_h_tech = $IPLAN_h_tech;

        return $this;
    }

    public function getIPWLANHTech(): ?string
    {
        return $this->IPWLAN_h_tech;
    }

    public function setIPWLANHTech(?string $IPWLAN_h_tech): self
    {
        $this->IPWLAN_h_tech = $IPWLAN_h_tech;

        return $this;
    }

    public function getProduitSNHTech(): ?string
    {
        return $this->produitSN_h_tech;
    }

    public function setProduitSNHTech(?string $produitSN_h_tech): self
    {
        $this->produitSN_h_tech = $produitSN_h_tech;

        return $this;
    }

    public function getAdresseMac2HTech(): ?string
    {
        return $this->adresse_mac_2_h_tech;
    }

    public function setAdresseMac2HTech(?string $adresse_mac_2_h_tech): self
    {
        $this->adresse_mac_2_h_tech = $adresse_mac_2_h_tech;

        return $this;
    }

    public function getClipperLocalHTech(): ?string
    {
        return $this->clipperLocal_h_tech;
    }

    public function setClipperLocalHTech(?string $clipperLocal_h_tech): self
    {
        $this->clipperLocal_h_tech = $clipperLocal_h_tech;

        return $this;
    }

    public function getClipperTSEHTech(): ?string
    {
        return $this->clipperTSE_h_tech;
    }

    public function setClipperTSEHTech(?string $clipperTSE_h_tech): self
    {
        $this->clipperTSE_h_tech = $clipperTSE_h_tech;

        return $this;
    }

    public function getCleClipHTech(): ?string
    {
        return $this->cleClip_h_tech;
    }

    public function setCleClipHTech(?string $cleClip_h_tech): self
    {
        $this->cleClip_h_tech = $cleClip_h_tech;

        return $this;
    }

    public function getObservationHTech(): ?string
    {
        return $this->observation_h_tech;
    }

    public function setObservationHTech(?string $observation_h_tech): self
    {
        $this->observation_h_tech = $observation_h_tech;

        return $this;
    }

    public function getMdpAdminLocalHTech(): ?string
    {
        return $this->mdpAdminLocal_h_tech;
    }

    public function setMdpAdminLocalHTech(?string $mdpAdminLocal_h_tech): self
    {
        $this->mdpAdminLocal_h_tech = $mdpAdminLocal_h_tech;

        return $this;
    }

    public function getServiceHTech(): ?string
    {
        return $this->service_h_tech;
    }

    public function setServiceHTech(?string $service_h_tech): self
    {
        $this->service_h_tech = $service_h_tech;

        return $this;
    }

    public function getPrixAchatHTech(): ?string
    {
        return $this->prixAchat_h_tech;
    }

    public function setPrixAchatHTech(?string $prixAchat_h_tech): self
    {
        $this->prixAchat_h_tech = $prixAchat_h_tech;

        return $this;
    }

    public function getSilog(): ?string
    {
        return $this->silog;
    }

    public function setSilog(?string $silog): self
    {
        $this->silog = $silog;

        return $this;
    }

    public function getNumBureauHTech(): ?string
    {
        return $this->numBureau_h_tech;
    }

    public function setNumBureauHTech(?string $numBureau_h_tech): self
    {
        $this->numBureau_h_tech = $numBureau_h_tech;

        return $this;
    }

    public function getRefHTech(): ?string
    {
        return $this->ref_h_tech;
    }

    public function setRefHTech(?string $ref_h_tech): self
    {
        $this->ref_h_tech = $ref_h_tech;

        return $this;
    }

    public function getProcesseurHTech(): ?string
    {
        return $this->processeur_h_tech;
    }

    public function setProcesseurHTech(?string $processeur_h_tech): self
    {
        $this->processeur_h_tech = $processeur_h_tech;

        return $this;
    }

    public function getMemoireHTech(): ?string
    {
        return $this->memoire_h_tech;
    }

    public function setMemoireHTech(?string $memoire_h_tech): self
    {
        $this->memoire_h_tech = $memoire_h_tech;

        return $this;
    }

    public function getDisqueDurHTech(): ?string
    {
        return $this->disqueDur_h_tech;
    }

    public function setDisqueDurHTech(?string $disqueDur_h_tech): self
    {
        $this->disqueDur_h_tech = $disqueDur_h_tech;

        return $this;
    }

    public function getDateAchat(): ?string
    {
        return $this->dateAchat;
    }

    public function setDateAchat(?string $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getGarantieHTech(): ?string
    {
        return $this->garantie_h_tech;
    }

    public function setGarantieHTech(?string $garantie_h_tech): self
    {
        $this->garantie_h_tech = $garantie_h_tech;

        return $this;
    }

    public function getFoPHTech(): ?string
    {
        return $this->FoP_h_tech;
    }

    public function setFoPHTech(?string $FoP_h_tech): self
    {
        $this->FoP_h_tech = $FoP_h_tech;

        return $this;
    }

    public function getEcranHTech(): ?string
    {
        return $this->ecran_h_tech;
    }

    public function setEcranHTech(?string $ecran_h_tech): self
    {
        $this->ecran_h_tech = $ecran_h_tech;

        return $this;
    }

    public function getSystExploiHTech(): ?string
    {
        return $this->systExploi_h_tech;
    }

    public function setSystExploiHTech(?string $systExploi_h_tech): self
    {
        $this->systExploi_h_tech = $systExploi_h_tech;

        return $this;
    }

    public function getExpressServiceCodeHTech(): ?string
    {
        return $this->expressServiceCode_h_tech;
    }

    public function setExpressServiceCodeHTech(?string $expressServiceCode_h_tech): self
    {
        $this->expressServiceCode_h_tech = $expressServiceCode_h_tech;

        return $this;
    }

    public function getCarepackHPHTech(): ?string
    {
        return $this->carepackHP_h_tech;
    }

    public function setCarepackHPHTech(?string $carepackHP_h_tech): self
    {
        $this->carepackHP_h_tech = $carepackHP_h_tech;

        return $this;
    }

    public function getCarepackDate(): ?string
    {
        return $this->carepackDate;
    }

    public function setCarepackDate(?string $carepackDate): self
    {
        $this->carepackDate = $carepackDate;

        return $this;
    }

    public function getProductHTech(): ?string
    {
        return $this->product_h_tech;
    }

    public function setProductHTech(?string $product_h_tech): self
    {
        $this->product_h_tech = $product_h_tech;

        return $this;
    }

    public function getNumSerieHTech(): ?string
    {
        return $this->numSerie_h_tech;
    }

    public function setNumSerieHTech(?string $numSerie_h_tech): self
    {
        $this->numSerie_h_tech = $numSerie_h_tech;

        return $this;
    }

    public function getIsoHTech(): ?string
    {
        return $this->iso_h_tech;
    }

    public function setIsoHTech(?string $iso_h_tech): self
    {
        $this->iso_h_tech = $iso_h_tech;

        return $this;
    }

    public function getImprimanteHTech(): ?string
    {
        return $this->imprimante_h_tech;
    }

    public function setImprimanteHTech(?string $imprimante_h_tech): self
    {
        $this->imprimante_h_tech = $imprimante_h_tech;

        return $this;
    }

    public function getReferenceHTech(): ?string
    {
        return $this->reference_h_tech;
    }

    public function setReferenceHTech(?string $reference_h_tech): self
    {
        $this->reference_h_tech = $reference_h_tech;

        return $this;
    }

    public function getSacocheHTech(): ?string
    {
        return $this->sacoche_h_tech;
    }

    public function setSacocheHTech(?string $sacoche_h_tech): self
    {
        $this->sacoche_h_tech = $sacoche_h_tech;

        return $this;
    }

    public function getPackOfficeHTech(): ?string
    {
        return $this->packOffice_h_tech;
    }

    public function setPackOfficeHTech(?string $packOffice_h_tech): self
    {
        $this->packOffice_h_tech = $packOffice_h_tech;

        return $this;
    }

    public function getAntivirusHTech(): ?string
    {
        return $this->antivirus_h_tech;
    }

    public function setAntivirusHTech(?string $antivirus_h_tech): self
    {
        $this->antivirus_h_tech = $antivirus_h_tech;

        return $this;
    }

    public function getScanHTech(): ?string
    {
        return $this->scan_h_tech;
    }

    public function setScanHTech(?string $scan_h_tech): self
    {
        $this->scan_h_tech = $scan_h_tech;

        return $this;
    }

    public function getSilogHTech(): ?string
    {
        return $this->silog_h_tech;
    }

    public function setSilogHTech(?string $silog_h_tech): self
    {
        $this->silog_h_tech = $silog_h_tech;

        return $this;
    }

    public function getAutocadHTech(): ?string
    {
        return $this->autocad_h_tech;
    }

    public function setAutocadHTech(?string $autocad_h_tech): self
    {
        $this->autocad_h_tech = $autocad_h_tech;

        return $this;
    }

    public function getAutresHTech(): ?string
    {
        return $this->autres_h_tech;
    }

    public function setAutresHTech(?string $autres_h_tech): self
    {
        $this->autres_h_tech = $autres_h_tech;

        return $this;
    }

    public function getMSprojectHTech(): ?string
    {
        return $this->MSproject_h_tech;
    }

    public function setMSprojectHTech(?string $MSproject_h_tech): self
    {
        $this->MSproject_h_tech = $MSproject_h_tech;

        return $this;
    }

    public function getIdentifieHTech(): ?string
    {
        return $this->identifie_h_tech;
    }

    public function setIdentifieHTech(?string $identifie_h_tech): self
    {
        $this->identifie_h_tech = $identifie_h_tech;

        return $this;
    }

    public function getScriptDemarHTech(): ?string
    {
        return $this->scriptDemar_h_tech;
    }

    public function setScriptDemarHTech(?string $scriptDemar_h_tech): self
    {
        $this->scriptDemar_h_tech = $scriptDemar_h_tech;

        return $this;
    }

    public function  __toString()
    {
        return $this->utilisateur_h_tech;
    }

    public function getRobot(): ?string
    {
        return $this->robot;
    }

    public function setRobot(?string $robot): self
    {
        $this->robot = $robot;

        return $this;
    }
}
