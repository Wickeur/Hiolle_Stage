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
    private $microsoft_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $station_acceuil_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moniteur_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clavier_souris_h_tech;

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

    public function getMicrosoftHTech(): ?string
    {
        return $this->microsoft_h_tech;
    }

    public function setMicrosoftHTech(?string $microsoft_h_tech): self
    {
        $this->microsoft_h_tech = $microsoft_h_tech;

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

    public function getMoniteurHTech(): ?string
    {
        return $this->moniteur_h_tech;
    }

    public function setMoniteurHTech(?string $moniteur_h_tech): self
    {
        $this->moniteur_h_tech = $moniteur_h_tech;

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

    public function  __toString()
    {
        return $this->utilisateur_h_tech;
    }
}
