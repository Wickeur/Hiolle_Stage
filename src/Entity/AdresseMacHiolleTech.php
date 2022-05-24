<?php

namespace App\Entity;

use App\Repository\AdresseMacHiolleTechRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdresseMacHiolleTechRepository::class)
 */
class AdresseMacHiolleTech
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ip_adr_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ip_cetam_h_tech;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mac_adr_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $utilisateur_adr_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hiolle_adr_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cetam_adr_h_tech;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIpAdrHTech(): ?string
    {
        return $this->ip_adr_h_tech;
    }

    public function setIpAdrHTech(?string $ip_adr_h_tech): self
    {
        $this->ip_adr_h_tech = $ip_adr_h_tech;

        return $this;
    }

    public function getIpCetamHTech(): ?string
    {
        return $this->ip_cetam_h_tech;
    }

    public function setIpCetamHTech(string $ip_cetam_h_tech): self
    {
        $this->ip_cetam_h_tech = $ip_cetam_h_tech;

        return $this;
    }

    public function getMacAdrHTech(): ?string
    {
        return $this->mac_adr_h_tech;
    }

    public function setMacAdrHTech(string $mac_adr_h_tech): self
    {
        $this->mac_adr_h_tech = $mac_adr_h_tech;

        return $this;
    }

    public function getUtilisateurAdrHTech(): ?string
    {
        return $this->utilisateur_adr_h_tech;
    }

    public function setUtilisateurAdrHTech(?string $utilisateur_adr_h_tech): self
    {
        $this->utilisateur_adr_h_tech = $utilisateur_adr_h_tech;

        return $this;
    }

    public function getHiolleAdrHTech(): ?string
    {
        return $this->hiolle_adr_h_tech;
    }

    public function setHiolleAdrHTech(?string $hiolle_adr_h_tech): self
    {
        $this->hiolle_adr_h_tech = $hiolle_adr_h_tech;

        return $this;
    }

    public function getCetamAdrHTech(): ?string
    {
        return $this->cetam_adr_h_tech;
    }

    public function setCetamAdrHTech(?string $cetam_adr_h_tech): self
    {
        $this->cetam_adr_h_tech = $cetam_adr_h_tech;

        return $this;
    }
}
