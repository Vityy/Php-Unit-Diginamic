<?php
require_once __DIR__ .'/../src/CompteBancaire.php';
use PHPUnit\Framework\TestCase;

class CompteBancaireTest extends TestCase
{
    public function testCreationCompteBancaire(): void
    {
        $account = new CompteBancaire('Alice', 100.0);
        $this->assertEquals('Alice', $account->getTitulaire());
        $this->assertEquals(100.0, $account->getSolde());
    }

    public function testCreationCompteSoldeInitialDefaut(): void
    {
        $account = new CompteBancaire('Alice');
        $this->assertEquals(0, $account->getSolde());
    }

    public function testCrediterAugmenteLeSolder(): void
    {
        $account = new CompteBancaire('Alice', 100.0);
        $account->crediter(50.0);
        $this->assertEquals(150.0, $account->getSolde());
    }

    public function testDebiterDiminueLeSolde(): void
    {
        $account = new CompteBancaire('Alice', 100.0);
        $account->debiter(30.0);
        $this->assertEquals(70.0, $account->getSolde());
    }

    public function testCrediterMontantNegatifLanceException(): void
    {
        $account = new CompteBancaire('Alice', 100.0);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Le montant à créditer doit être positif.');
        $account->crediter(-10.0);
    }

    public function testDebiterMontantNegatifLanceException(): void
    {
        $account = new CompteBancaire('Alice', 100.0);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Le montant à débiter doit être positif.');
        $account->debiter(-5.0);
    }

    public function testDebiterFondsInsuffisantsLanceException(): void
    {
        $account = new CompteBancaire('Alice', 100.0);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Fonds insuffisants.');
        $account->debiter(200.0);
    }

    public function testVirerTransfertBienEffectue(): void
    {
        $account1 = new CompteBancaire('Alice', 100.0);
        $account2 = new CompteBancaire('Bob');
        $account1->virer($account2, 40.0);
        $this->assertEquals(60.0, $account1->getSolde());
        $this->assertEquals(40.0, $account2->getSolde());
    }

    public function testVirerAvecFondsInsuffisantsNeModifieAucunSolde(): void
    {
        $account1 = new CompteBancaire('Alice', 100.0);
        $account2 = new CompteBancaire('Bob');
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Fonds insuffisants.');
        $account1->virer($account2, 200.0);
        $this->assertEquals(100.0, $account1->getSolde());
        $this->assertEquals(0.0, $account2->getSolde());
    }
}