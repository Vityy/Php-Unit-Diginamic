<?php

class Utilisateur
{
    private string $nom;
    private string $email;
    private bool $actif = true;

    public function __construct(string $nom, string $email)
    {
        if (trim($nom) === '')
        {
            throw new InvalidArgumentException('Le nom ne peut pas être vide.');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidArgumentException('Email invalide.');
        }

        $this->nom = $nom;
        $this->email = $email;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function estActif(): bool
    {
        return $this->actif;
    }

    public function desactiver(): void
    {
        $this->actif = false;
    }
}