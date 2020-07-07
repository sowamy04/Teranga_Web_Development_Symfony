<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ChambreRepository;
use Doctrine\ORM\Mapping as ORM;

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
     */
    private $numChambre;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotNull
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=3)
     * @Assert\NotNull 
     */
    private $numBatiment;

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

    public function getNumBatiment(): ?string
    {
        return $this->numBatiment;
    }

    public function setNumBatiment(string $numBatiment): self
    {
        $this->numBatiment = $numBatiment;

        return $this;
    }


}
