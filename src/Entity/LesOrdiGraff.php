<?php

namespace App\Entity;

use App\Repository\LesOrdiGraffRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LesOrdiGraffRepository::class)
 */
class LesOrdiGraff
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
    private $nom_station_graff;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $utilisateur_graff;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque_station_graff;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_mac_graff;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tag_graff;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $microsoft_graff;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $station_acceuil_graff;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moniteur_graff;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clavier_souris_graff;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStationGraff(): ?string
    {
        return $this->nom_station_graff;
    }

    public function setNomStationGraff(string $nom_station_graff): self
    {
        $this->nom_station_graff = $nom_station_graff;

        return $this;
    }

    public function getUtilisateurGraff(): ?string
    {
        return $this->utilisateur_graff;
    }

    public function setUtilisateurGraff(?string $utilisateur_graff): self
    {
        $this->utilisateur_graff = $utilisateur_graff;

        return $this;
    }

    public function getMarqueStationGraff(): ?string
    {
        return $this->marque_station_graff;
    }

    public function setMarqueStationGraff(?string $marque_station_graff): self
    {
        $this->marque_station_graff = $marque_station_graff;

        return $this;
    }

    public function getAdresseMacGraff(): ?string
    {
        return $this->adresse_mac_graff;
    }

    public function setAdresseMacGraff(?string $adresse_mac_graff): self
    {
        $this->adresse_mac_graff = $adresse_mac_graff;

        return $this;
    }

    public function getTagGraff(): ?string
    {
        return $this->tag_graff;
    }

    public function setTagGraff(?string $tag_graff): self
    {
        $this->tag_graff = $tag_graff;

        return $this;
    }

    public function getMicrosoftGraff(): ?string
    {
        return $this->microsoft_graff;
    }

    public function setMicrosoftGraff(?string $microsoft_graff): self
    {
        $this->microsoft_graff = $microsoft_graff;

        return $this;
    }

    public function getStationAcceuilGraff(): ?string
    {
        return $this->station_acceuil_graff;
    }

    public function setStationAcceuilGraff(?string $station_acceuil_graff): self
    {
        $this->station_acceuil_graff = $station_acceuil_graff;

        return $this;
    }

    public function getMoniteurGraff(): ?string
    {
        return $this->moniteur_graff;
    }

    public function setMoniteurGraff(?string $moniteur_graff): self
    {
        $this->moniteur_graff = $moniteur_graff;

        return $this;
    }

    public function getClavierSourisGraff(): ?string
    {
        return $this->clavier_souris_graff;
    }

    public function setClavierSourisGraff(?string $clavier_souris_graff): self
    {
        $this->clavier_souris_graff = $clavier_souris_graff;

        return $this;
    }

    public function __toString()
    {
        return $this->utilisateur_graff;
    }
}
