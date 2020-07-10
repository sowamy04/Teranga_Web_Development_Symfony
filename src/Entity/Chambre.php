<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ChambreRepository::class)
 */
class Chambre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\NotBlank
     */
    private $numChambre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $numBatiment;

    /**
     * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="chambre")
     */
    private $etudiant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;

    public function __construct()
    {
        $this->etudiant = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumChambre(): ?string
    {
        return $this->numChambre;
    }

    public function setNumChambre(string $numChambre): self
    {
        $this->numChambre = $numChambre;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumBatiment(): ?int
    {
        return $this->numBatiment;
    }

    public function setNumBatiment(int $numBatiment): self
    {
        $this->numBatiment = $numBatiment;

        return $this;
    }

    /**
     * @return Collection|Etudiant[]
     */
    public function getEtudiant(): Collection
    {
        return $this->etudiant;
    }

    public function addEtudiant(Etudiant $etudiant): self
    {
        if (!$this->etudiant->contains($etudiant)) {
            $this->etudiant[] = $etudiant;
            $etudiant->setChambre($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): self
    {
        if ($this->etudiant->contains($etudiant)) {
            $this->etudiant->removeElement($etudiant);
            // set the owning side to null (unless already changed)
            if ($etudiant->getChambre() === $this) {
                $etudiant->setChambre(null);
            }
        }

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }


}
