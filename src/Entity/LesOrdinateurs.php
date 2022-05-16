<?php

namespace App\Entity;

use App\Repository\LesOrdinateursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LesOrdinateursRepository::class)
 */
class LesOrdinateurs
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
    private $Nom_de_la_station;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Utilisateur_habituel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Marque_de_la_station;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Adresse_Mac;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TAG;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Microsoft_Office;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Station_Acceuil;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Moniteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Clavier_Souris;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDeLaStation(): ?string
    {
        return $this->Nom_de_la_station;
    }

    public function setNomDeLaStation(string $Nom_de_la_station): self
    {
        $this->Nom_de_la_station = $Nom_de_la_station;

        return $this;
    }

    public function getUtilisateurHabituel(): ?string
    {
        return $this->Utilisateur_habituel;
    }

    public function setUtilisateurHabituel(string $Utilisateur_habituel): self
    {
        $this->Utilisateur_habituel = $Utilisateur_habituel;

        return $this;
    }

    public function getMarqueDeLaStation(): ?string
    {
        return $this->Marque_de_la_station;
    }

    public function setMarqueDeLaStation(?string $Marque_de_la_station): self
    {
        $this->Marque_de_la_station = $Marque_de_la_station;

        return $this;
    }

    public function getAdresseMac(): ?string
    {
        return $this->Adresse_Mac;
    }

    public function setAdresseMac(?string $Adresse_Mac): self
    {
        $this->Adresse_Mac = $Adresse_Mac;

        return $this;
    }

    public function getTAG(): ?string
    {
        return $this->TAG;
    }

    public function setTAG(?string $TAG): self
    {
        $this->TAG = $TAG;

        return $this;
    }

    public function getMicrosoftOffice(): ?string
    {
        return $this->Microsoft_Office;
    }

    public function setMicrosoftOffice(?string $Microsoft_Office): self
    {
        $this->Microsoft_Office = $Microsoft_Office;

        return $this;
    }

    public function getStationAcceuil(): ?string
    {
        return $this->Station_Acceuil;
    }

    public function setStationAcceuil(?string $Station_Acceuil): self
    {
        $this->Station_Acceuil = $Station_Acceuil;

        return $this;
    }

    public function getMoniteur(): ?string
    {
        return $this->Moniteur;
    }

    public function setMoniteur(?string $Moniteur): self
    {
        $this->Moniteur = $Moniteur;

        return $this;
    }

    public function getClavierSouris(): ?string
    {
        return $this->Clavier_Souris;
    }

    public function setClavierSouris(?string $Clavier_Souris): self
    {
        $this->Clavier_Souris = $Clavier_Souris;

        return $this;
    }

    //permet d'afficher less valeurs dans la recherche avancée déroulante
    public function __toString()
    {
        return $this->Utilisateur_habituel;
    }
}
