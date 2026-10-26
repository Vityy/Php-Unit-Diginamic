<?php

class CompteBancaire
{
    private string $titulaire;
    private float $solde;

    public function __construct(string $titulaire, float $soldeInitial = 0.0)
    {
        if(trim($titulaire) === '')
        {
            throw new InvalidArgumentException('Le titulaire ne peut pas être vide.');
        }
        if($soldeInitial < 0)
        {
            throw new InvalidArgumentException('Le solde initial ne peut pas être négatif.');
        }
        $this->titulaire = $titulaire;
        $this->solde = $soldeInitial;
    }

    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    public function crediter(float $montant): void
    {
        if($montant <= 0)
        {
            throw new InvalidArgumentException('Le montant à créditer doit être positif.');
        }
        $this->solde += $montant;
    }

    public function debiter(float $montant): void
    {
        if($montant <= 0)
        {
            throw new InvalidArgumentException('Le montant à débiter doit être positif.');
        }
        if($montant > $this->solde)
        {
            throw new InvalidArgumentException('Fonds insuffisants.');
        }
        $this->solde -= $montant;
    }

    public function virer(CompteBancaire $destinataire, float $montant): void
    {
        $this->debiter($montant);
        $destinataire->crediter($montant);
    }
}