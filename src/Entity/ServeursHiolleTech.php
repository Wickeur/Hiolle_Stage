<?php

namespace App\Entity;

use App\Repository\ServeursHiolleTechRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServeursHiolleTechRepository::class)
 */
class ServeursHiolleTech
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
    private $nom_serv_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $salle_serv_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ip_serv_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dc_serv_h_tech;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $role_serv_h_tech;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomServHTech(): ?string
    {
        return $this->nom_serv_h_tech;
    }

    public function setNomServHTech(string $nom_serv_h_tech): self
    {
        $this->nom_serv_h_tech = $nom_serv_h_tech;

        return $this;
    }

    public function getSalleServHTech(): ?string
    {
        return $this->salle_serv_h_tech;
    }

    public function setSalleServHTech(?string $salle_serv_h_tech): self
    {
        $this->salle_serv_h_tech = $salle_serv_h_tech;

        return $this;
    }

    public function getIpServHTech(): ?string
    {
        return $this->ip_serv_h_tech;
    }

    public function setIpServHTech(?string $ip_serv_h_tech): self
    {
        $this->ip_serv_h_tech = $ip_serv_h_tech;

        return $this;
    }

    public function getDcServHTech(): ?string
    {
        return $this->dc_serv_h_tech;
    }

    public function setDcServHTech(?string $dc_serv_h_tech): self
    {
        $this->dc_serv_h_tech = $dc_serv_h_tech;

        return $this;
    }

    public function getRoleServHTech(): ?string
    {
        return $this->role_serv_h_tech;
    }

    public function setRoleServHTech(?string $role_serv_h_tech): self
    {
        $this->role_serv_h_tech = $role_serv_h_tech;

        return $this;
    }
}
