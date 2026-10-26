<?php
require_once __DIR__ .'/../src/Utilisateur.php';
use PHPUnit\Framework\TestCase;

class UtilisateurTest extends TestCase
{
    public function testCreationUtilisateurValide(): void
    {
        $user = new Utilisateur('Jean', 'jean@test.fr');
        $this->assertEquals('Jean', $user->getNom());
        $this->assertEquals('jean@test.fr', $user->getEmail());
        $this->assertTrue($user->estActif());
    }

    public function testDesactiverUtilisateur(): void
    {
        $user = new Utilisateur('Jean', 'jean@test.fr');
        $user->desactiver();
        $this->assertFalse($user->estActif());
    }

    public function testNomVideLanceUneException(): void
    {
        $this->expectExceptionMessage('Le nom ne peut pas être vide.');
        $user = new Utilisateur('', 'jean@test.fr');
    }

    public function testEmailInvalideLanceUneException(): void
    {
        $this->expectExceptionMessage('Email invalide.');
        $user = new Utilisateur('Jean', 'pas-un-email');
    }

    public function testEstUtilisateur(): void
    {
        $this->assertInstanceOf(Utilisateur::class, new Utilisateur('Jean', 'jean@test.fr'));
    }
}