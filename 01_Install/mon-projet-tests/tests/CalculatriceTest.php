<?php
//require_once __DIR__ .'/../src/Calculatrice.php';
//use PHPUnit\Framework\TestCase;
//
//class CalculatriceTest extends TestCase {
//    public function testAddition(): void {
//        // Arrange
//        $calc = new Calculatrice();
//        // Act
//        $resultat = $calc->addition(2, 3);
//        // Assert
//        $this->assertEquals(5, $resultat);
//    }
//
//    public function testSubtraction(): void {
//        $calc = new Calculatrice();
//        $resultat = $calc->subtraction(2, 3);
//        $this->assertEquals(-1, $resultat);
//    }
//
//    public function testMultiplication(): void {
//        $calc = new Calculatrice();
//        $resultat = $calc->multiplication(2, 3);
//        $this->assertEquals(6, $resultat);
//    }
//
//    public function testDivide(): void {
//        $calc = new Calculatrice();
//        $resultat = $calc->divide(6, 3);
//        $this->assertEquals(2, $resultat);
//    }
//
//    public function testDivideByZero(): void {
//        $calc = new Calculatrice();
//        $this->expectException(DivisionByZeroError::class);
//        $calc->divide(6, 0);
//    }
//}
