<?php

namespace App\Entity;

use App\Repository\NouveauEntrantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NouveauEntrantRepository::class)
 */
class NouveauEntrant
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
    private $nom_nouv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_nouv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $societe_nouv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $service_nouv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $materielPC_nouv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logiciel_nouv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sacoche_nouv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autreDemande_nouv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $accesReseau_nouv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_nouv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateArrivee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomNouv(): ?string
    {
        return $this->nom_nouv;
    }

    public function setNomNouv(string $nom_nouv): self
    {
        $this->nom_nouv = $nom_nouv;

        return $this;
    }

    public function getPrenomNouv(): ?string
    {
        return $this->prenom_nouv;
    }

    public function setPrenomNouv(string $prenom_nouv): self
    {
        $this->prenom_nouv = $prenom_nouv;

        return $this;
    }

    public function getSocieteNouv(): ?string
    {
        return $this->societe_nouv;
    }

    public function setSocieteNouv(string $societe_nouv): self
    {
        $this->societe_nouv = $societe_nouv;

        return $this;
    }

    public function getServiceNouv(): ?string
    {
        return $this->service_nouv;
    }

    public function setServiceNouv(string $service_nouv): self
    {
        $this->service_nouv = $service_nouv;

        return $this;
    }

    public function getMaterielPCNouv(): ?string
    {
        return $this->materielPC_nouv;
    }

    public function setMaterielPCNouv(string $materielPC_nouv): self
    {
        $this->materielPC_nouv = $materielPC_nouv;

        return $this;
    }

    public function getLogicielNouv(): ?string
    {
        return $this->logiciel_nouv;
    }

    public function setLogicielNouv(string $logiciel_nouv): self
    {
        $this->logiciel_nouv = $logiciel_nouv;

        return $this;
    }

    public function getSacocheNouv(): ?string
    {
        return $this->sacoche_nouv;
    }

    public function setSacocheNouv(string $sacoche_nouv): self
    {
        $this->sacoche_nouv = $sacoche_nouv;

        return $this;
    }

    public function getAutreDemandeNouv(): ?string
    {
        return $this->autreDemande_nouv;
    }

    public function setAutreDemandeNouv(?string $autreDemande_nouv): self
    {
        $this->autreDemande_nouv = $autreDemande_nouv;

        return $this;
    }

    public function getAccesReseauNouv(): ?string
    {
        return $this->accesReseau_nouv;
    }

    public function setAccesReseauNouv(string $accesReseau_nouv): self
    {
        $this->accesReseau_nouv = $accesReseau_nouv;

        return $this;
    }

    public function getAdresseNouv(): ?string
    {
        return $this->adresse_nouv;
    }

    public function setAdresseNouv(string $adresse_nouv): self
    {
        $this->adresse_nouv = $adresse_nouv;

        return $this;
    }

    public function getDateArrivee(): ?string
    {
        return $this->dateArrivee;
    }

    public function setDateArrivee(?string $dateArrivee): self
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }
}
