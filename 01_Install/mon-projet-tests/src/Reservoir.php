<?php

class Reservoir
{
    private float $capaciteMax;
    private float $niveau = 0.0;

    public function __construct(float $capaciteMax)
    {
        if ($capaciteMax <= 0)
        {
            throw new InvalidArgumentException('Capacité inférieure à 0 invalide.');
        }
        $this->capaciteMax = $capaciteMax;
    }

    public function getCapaciteMax(): float
    {
        return $this->capaciteMax;
    }

    public function getNiveau(): float
    {
        return $this->niveau;
    }

    public function remplir(float $quantite): void
    {
        if($quantite <= 0)
        {
            throw new InvalidArgumentException('Quantité invalide, impossible de remplir avec une valeur nulle ou négative');
        }

        if($quantite > $this->capaciteMax)
        {
            throw new InvalidArgumentException('Quantité au delà de la capacité maximale');
        }

        $this->niveau += $quantite;
    }

    public function vider(float $quantite): void
    {
        if($quantite <= 0)
        {
            throw new InvalidArgumentException('Quantité invalide, impossible de vider une valeur négative ou nulle');
        }

        if($quantite > $this->niveau)
        {
            throw new InvalidArgumentException('Quantité à vider au dela du niveau actuel');
        }

        $this->niveau -= $quantite;
    }

    public function estVide(): bool
    {
        if($this->niveau <= 0)
        {
            return true;
        }

        return false;
    }

    public function estPlein(): bool
    {
        if($this->niveau === $this->capaciteMax)
        {
            return true;
        }

        return false;
    }

    public function tauxRemplissage(): float
    {
        $taux = 0.0;

        $taux = $this->niveau / $this->capaciteMax * 100;

        return $taux;
    }
}