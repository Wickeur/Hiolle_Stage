<?php

namespace App\Entity;

use App\Repository\LicenceOnlineHiolleTechRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LicenceOnlineHiolleTechRepository::class)
 */
class LicenceOnlineHiolleTech
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
    private $produit_licence_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $poste_licence_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $utilisateur_licence_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code_licence_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date_licence_h_tech;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduitLicenceHTech(): ?string
    {
        return $this->produit_licence_h_tech;
    }

    public function setProduitLicenceHTech(string $produit_licence_h_tech): self
    {
        $this->produit_licence_h_tech = $produit_licence_h_tech;

        return $this;
    }

    public function getPosteLicenceHTech(): ?string
    {
        return $this->poste_licence_h_tech;
    }

    public function setPosteLicenceHTech(?string $poste_licence_h_tech): self
    {
        $this->poste_licence_h_tech = $poste_licence_h_tech;

        return $this;
    }

    public function getUtilisateurLicenceHTech(): ?string
    {
        return $this->utilisateur_licence_h_tech;
    }

    public function setUtilisateurLicenceHTech(?string $utilisateur_licence_h_tech): self
    {
        $this->utilisateur_licence_h_tech = $utilisateur_licence_h_tech;

        return $this;
    }

    public function getCodeLicenceHTech(): ?string
    {
        return $this->code_licence_h_tech;
    }

    public function setCodeLicenceHTech(?string $code_licence_h_tech): self
    {
        $this->code_licence_h_tech = $code_licence_h_tech;

        return $this;
    }

    public function getDateLicenceHTech(): ?string
    {
        return $this->date_licence_h_tech;
    }

    public function setDateLicenceHTech(?string $date_licence_h_tech): self
    {
        $this->date_licence_h_tech = $date_licence_h_tech;

        return $this;
    }
}
