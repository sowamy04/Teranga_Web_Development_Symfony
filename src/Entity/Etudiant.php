<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use App\Repository\EtudiantRepository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @Assert\Length(min = 2,minMessage = "La longueur minimale est de 2 caracteres.")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=75)
     * @Assert\Length(min = 2,minMessage = "La longueur minimale est de 4 caracteres.")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", message="Un email valide est sous la forme exemple@exemple.com") 
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=25)
     * @Assert\Regex(pattern="/^(002217|7)(0|7|8){1}[0-9]{7}/", message="Un nummero valide est sous la forme 7xxxxxxxx") 
     */
    private $telephone;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateInscription;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeEtudiant;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pension;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=Chambre::class, inversedBy="etudiants")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $chambre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matricule;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getTypeEtudiant(): ?string
    {
        return $this->typeEtudiant;
    }

    public function setTypeEtudiant(string $typeEtudiant): self
    {
        $this->typeEtudiant = $typeEtudiant;

        return $this;
    }

    public function getPension(): ?float
    {
        return $this->pension;
    }

    public function setPension(?float $pension): self
    {
        $this->pension = $pension;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getChambre(): ?Chambre
    {
        return $this->chambre;
    }

    public function setChambre(?Chambre $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }
}
