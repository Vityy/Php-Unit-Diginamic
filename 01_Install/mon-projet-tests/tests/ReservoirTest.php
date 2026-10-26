<?php
require_once __DIR__ .'/../src/Reservoir.php';
use PHPUnit\Framework\TestCase;

class ReservoirTest extends TestCase
{
    public function testCreationAvecCapaciteValide(): void
    {
        $reservoir = new Reservoir(100.0);
        $this->assertEquals(100.0, $reservoir->getCapaciteMax());
        $this->assertEquals(0.0, $reservoir->getNiveau());
    }

    public function testCapaciteInferieureAZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Capacité inférieure à 0 invalide.');
        $reservoir = new Reservoir(-10.0);
    }

    public function testRemplissageNominal(): void
    {
        $reservoir = new Reservoir(100.0);
        $reservoir->remplir(100.0);
        $this->assertEquals(100.0, $reservoir->getNiveau());
    }

    public function testRemplissageAuDelaCapacite(): void
    {
        $reservoir = new Reservoir(100.0);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantité au delà de la capacité maximale');
        $reservoir->remplir(110.0);
    }

    public function testVidageNominal(): void
    {
        $reservoir = new Reservoir(100.0);
        $reservoir->remplir(100.0);
        $this->assertEquals(100.0, $reservoir->getNiveau());
        $reservoir->vider(100.0);
        $this->assertEquals(0.0, $reservoir->getNiveau());
    }

    public function testVidageTropImportant(): void
    {
        $reservoir = new Reservoir(100.0);
        $reservoir->remplir(50.0);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantité à vider au dela du niveau actuel');
        $reservoir->vider(60.0);
    }

    public function testEstVide(): void
    {
        $reservoir = new Reservoir(100.0);
        $this->assertTrue($reservoir->estVide());
    }

    public function testEstPlein(): void
    {
        $reservoir = new Reservoir(100.0);
        $reservoir->remplir(100.0);
        $this->assertTrue($reservoir->estPlein());
    }

    public function testTauxRemplissage(): void
    {
        $reservoir = new Reservoir(100.0);
        $reservoir->remplir(60.0);
        $this->assertEquals(60.0, $reservoir->tauxRemplissage());
    }

    public function testRemplissageMontantsNegatifsOuNuls(): void
    {
        $reservoir = new Reservoir(100.0);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantité invalide, impossible de remplir avec une valeur nulle ou négative');
        $reservoir->remplir(-1.0);
    }

    public function testVidageMontantsNegatifsOuNuls(): void
    {
        $reservoir = new Reservoir(100.0);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantité invalide, impossible de vider une valeur négative ou nulle');
        $reservoir->vider(-1.0);
    }
}