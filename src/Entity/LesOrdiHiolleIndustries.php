<?php

namespace App\Entity;

use App\Repository\LesOrdiHiolleIndustriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LesOrdiHiolleIndustriesRepository::class)
 */
class LesOrdiHiolleIndustries
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
    private $nom_station_h_indu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $utilisateur_h_indu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marque_station_h_indu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_mac_h_indu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tag_h_indu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $microsoft_h_indu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $station_acceuil_h_indu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moniteur_h_indu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $clavier_souris_h_indu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStationHIndu(): ?string
    {
        return $this->nom_station_h_indu;
    }

    public function setNomStationHIndu(string $nom_station_h_indu): self
    {
        $this->nom_station_h_indu = $nom_station_h_indu;

        return $this;
    }

    public function getUtilisateurHIndu(): ?string
    {
        return $this->utilisateur_h_indu;
    }

    public function setUtilisateurHIndu(?string $utilisateur_h_indu): self
    {
        $this->utilisateur_h_indu = $utilisateur_h_indu;

        return $this;
    }

    public function getMarqueStationHIndu(): ?string
    {
        return $this->marque_station_h_indu;
    }

    public function setMarqueStationHIndu(?string $marque_station_h_indu): self
    {
        $this->marque_station_h_indu = $marque_station_h_indu;

        return $this;
    }

    public function getAdresseMacHIndu(): ?string
    {
        return $this->adresse_mac_h_indu;
    }

    public function setAdresseMacHIndu(?string $adresse_mac_h_indu): self
    {
        $this->adresse_mac_h_indu = $adresse_mac_h_indu;

        return $this;
    }

    public function getTagHIndu(): ?string
    {
        return $this->tag_h_indu;
    }

    public function setTagHIndu(?string $tag_h_indu): self
    {
        $this->tag_h_indu = $tag_h_indu;

        return $this;
    }

    public function getMicrosoftHIndu(): ?string
    {
        return $this->microsoft_h_indu;
    }

    public function setMicrosoftHIndu(?string $microsoft_h_indu): self
    {
        $this->microsoft_h_indu = $microsoft_h_indu;

        return $this;
    }

    public function getStationAcceuilHIndu(): ?string
    {
        return $this->station_acceuil_h_indu;
    }

    public function setStationAcceuilHIndu(?string $station_acceuil_h_indu): self
    {
        $this->station_acceuil_h_indu = $station_acceuil_h_indu;

        return $this;
    }

    public function getMoniteurHIndu(): ?string
    {
        return $this->moniteur_h_indu;
    }

    public function setMoniteurHIndu(?string $moniteur_h_indu): self
    {
        $this->moniteur_h_indu = $moniteur_h_indu;

        return $this;
    }

    public function getClavierSourisHIndu(): ?string
    {
        return $this->clavier_souris_h_indu;
    }

    public function setClavierSourisHIndu(?string $clavier_souris_h_indu): self
    {
        $this->clavier_souris_h_indu = $clavier_souris_h_indu;

        return $this;
    }

    public function __toString()
    {
        return $this->utilisateur_h_indu;
    }
}
