<?php
namespace App\Test\Entity;

use App\Entity\CompteBancaire;
use PHPUnit\Framework\TestCase;

class CompteBancaireTest extends TestCase
{
    public function testRetirerMontantValide(): void
    {
        $compteBancaire = new CompteBancaire('wejden', 100);
        $compteBancaire->retirer(50); 
        $this->assertSame(50, $compteBancaire->getSolde());
    }

    public function testRetirerMontantInvalide(): void
    {
        $compteBancaire = new CompteBancaire('***', 10);
        
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Solde insuffisant');
        $compteBancaire->retirer(100);
    }
}