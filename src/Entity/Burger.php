<?php

namespace App\Entity;

use App\Repository\AgencesRepository;
use App\Repository\BurgerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BurgerRepository::class)]
class Burger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
 
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Image $image = null;

    #[ORM\ManyToOne(targetEntity: Pain::class, inversedBy: 'burger')]
    private ?Pain $pain = null;

    #[ORM\OneToMany(mappedBy: 'burger', targetEntity: Oignon::class)]
    private ?Oignon $oignon = null;
    
    #[ORM\OneToMany(mappedBy: 'burger', targetEntity: Sauce::class)]
    private ?Sauce $sauce = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Commentaire $commentaire = null;

    #[ORM\Column(length: 255)]
    private ?string $cornichon = null;

    public function getId (): ?int
    {
        return $this->id;
    }

    public function getNom (): ?string
    {
        return $this->nom;
    }

    public function setNom (string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getImage (): ?Image
    {
        return $this->image;
    }

    public function setImage (Image $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getPain (): ?Pain
    {
        return $this->pain;
    }

    public function setPain (Pain $pain): self
    {
        $this->pain = $pain;
        return $this;
    }

    public function getOignon (): ?Oignon
    {
        return $this->oignon;
    }

    public function setOignon (Oignon $oignon): self
    {
        $this->oignon = $oignon;
        return $this;
    }

    public function getSauce (): ?Sauce
    {
        return $this->sauce;
    }

    public function setSauce (Sauce $sauce): self
    {
        $this->sauce = $sauce;
        return $this;
    }

    public function getCommentaire (): ?Commentaire
    {
        return $this->commentaire;
    }

    public function setCommentaire (Commentaire $commentaire): self
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getCornichon(): ?string
    {
        return $this->cornichon;
    }

    public function setCornichon(string $cornichon): static
    {
        $this->cornichon = $cornichon;

        return $this;
    }
}