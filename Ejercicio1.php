<?php

class CuentaBancaria {
    public $titular;
    public $saldo;
    public $tipoDeCuenta;

    // Depositamos dinero
    public function depositar($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
            echo "El saldo que tienes ahora es de: " . $this->saldo . " €\n";
        } else {
            echo "Si quieres depositar dinero tiene que ser un numero mayor que 0\n";
        }
    }

    // Retiramos dinero
    public function retirar($cantidad) {
        if ($cantidad > 0 && $cantidad <= $this->saldo) {
            $this->saldo -= $cantidad;
            echo "El saldo que tienes ahora es de: " . $this->saldo . " €\n";
        } elseif ($cantidad <= 0) {
            echo "No puedes retirar dinero negativo\n";
        } else {
            echo "No puedes retirar tanto , el dinero que te queda es esto : " . $this->saldo . " €\n";
        }
    }

    // Mostramos la informacion
    public function mostrarInfo() {
        echo "Titular: " . $this->titular . "\n";
        echo "Tipo de cuenta: " . $this->tipoDeCuenta . "\n";
        echo "Saldo: " . $this->saldo . " €\n";
    }
}

$micuentabancaria = new CuentaBancaria();
$micuentabancaria->titular = "Juan Luis Simancas Prundea";
$micuentabancaria->tipoDeCuenta = "Española";
$micuentabancaria->saldo = 1000;

//Lo mostramos
$micuentabancaria->depositar(500);
echo "\n--------------------\n";
$micuentabancaria->retirar(200);
echo "\n--------------------\n";
echo "Informacion de la cuenta:\n";
$micuentabancaria->mostrarInfo();
