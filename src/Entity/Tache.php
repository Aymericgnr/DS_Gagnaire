<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TacheRepository::class)
 */
class Tache
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
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="taches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Priorite;

    /**
     * @ORM\ManyToOne(targetEntity=Priorite::class, inversedBy="taches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Propriete;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPriorite(): ?string
    {
        return $this->Priorite;
    }

    public function setPriorite(string $Priorite): self
    {
        $this->Priorite = $Priorite;

        return $this;
    }

    public function getPropriete(): ?Priorite
    {
        return $this->Propriete;
    }

    public function setPropriete(?Priorite $Propriete): self
    {
        $this->Propriete = $Propriete;

        return $this;
    }
}
