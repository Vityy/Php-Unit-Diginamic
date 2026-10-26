<?php
class Calculatrice {
    public function addition(int $a, int $b): int {
        return $a + $b;
    }

    public function subtraction(int $a, int $b): int {
        return $a - $b;
    }

    public function multiplication(int $a, int $b): int {
        return $a * $b;
    }

    public function divide(int $a, int $b): int {
        return $a / $b;
    }
}
