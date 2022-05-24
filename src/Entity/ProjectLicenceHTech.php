<?php

namespace App\Entity;

use App\Repository\ProjectLicenceHTechRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectLicenceHTechRepository::class)
 */
class ProjectLicenceHTech
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
    private $poste_p_l_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $utilisateur_p_l_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $licence_p_l_h_tech;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostePLHTech(): ?string
    {
        return $this->poste_p_l_h_tech;
    }

    public function setPostePLHTech(string $poste_p_l_h_tech): self
    {
        $this->poste_p_l_h_tech = $poste_p_l_h_tech;

        return $this;
    }

    public function getUtilisateurPLHTech(): ?string
    {
        return $this->utilisateur_p_l_h_tech;
    }

    public function setUtilisateurPLHTech(string $utilisateur_p_l_h_tech): self
    {
        $this->utilisateur_p_l_h_tech = $utilisateur_p_l_h_tech;

        return $this;
    }

    public function getLicencePLHTech(): ?string
    {
        return $this->licence_p_l_h_tech;
    }

    public function setLicencePLHTech(?string $licence_p_l_h_tech): self
    {
        $this->licence_p_l_h_tech = $licence_p_l_h_tech;

        return $this;
    }
}
