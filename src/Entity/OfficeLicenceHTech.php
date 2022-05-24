<?php

namespace App\Entity;

use App\Repository\OfficeLicenceHTechRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfficeLicenceHTechRepository::class)
 */
class OfficeLicenceHTech
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
    private $poste_o_l_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $utilisateur_o_l_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type_o_l_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $licence_o_l_h_tech;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosteOLHTech(): ?string
    {
        return $this->poste_o_l_h_tech;
    }

    public function setPosteOLHTech(string $poste_o_l_h_tech): self
    {
        $this->poste_o_l_h_tech = $poste_o_l_h_tech;

        return $this;
    }

    public function getUtilisateurOLHTech(): ?string
    {
        return $this->utilisateur_o_l_h_tech;
    }

    public function setUtilisateurOLHTech(?string $utilisateur_o_l_h_tech): self
    {
        $this->utilisateur_o_l_h_tech = $utilisateur_o_l_h_tech;

        return $this;
    }

    public function getTypeOLHTech(): ?string
    {
        return $this->type_o_l_h_tech;
    }

    public function setTypeOLHTech(?string $type_o_l_h_tech): self
    {
        $this->type_o_l_h_tech = $type_o_l_h_tech;

        return $this;
    }

    public function getLicenceOLHTech(): ?string
    {
        return $this->licence_o_l_h_tech;
    }

    public function setLicenceOLHTech(?string $licence_o_l_h_tech): self
    {
        $this->licence_o_l_h_tech = $licence_o_l_h_tech;

        return $this;
    }
}
