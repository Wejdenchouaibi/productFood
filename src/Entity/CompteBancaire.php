<?php

namespace App\Entity;

use App\Repository\CompteBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteBancaireRepository::class)]
class CompteBancaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $proprietaire = null;

    #[ORM\Column]
    private ?float $solde = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): static
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(float $solde): static
    {
        $this->solde = $solde;

        return $this;
    }

    public function __construct($proprietaire, $solde)
    {
        $this->proprietaire = $proprietaire;
        $this->solde = $solde;
    }

    public function retirer(float $montant): float
    {
        if ($montant <= 0) {
            throw new \Exception("Le montant à retirer doit être positif.");
        }

        if ($this->solde - $montant < 0) {
            throw new \Exception("Solde insuffisant.");
        }

        $this->solde -= $montant;
        return $this->solde;
    }
}