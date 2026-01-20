<?php

class Empleado {
    public $nombre;
    public $sueldo;
    public $aniosExperiencia;

    public function __construct($nombre, $sueldo, $aniosExperiencia) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->aniosExperiencia = $aniosExperiencia;
    }

    // Calcular bonus
    public function calcularBonus() {
        $multiplicador = intval($this->aniosExperiencia / 2);
        return $this->sueldo * 0.05 * $multiplicador;
    }

    // Mostrar detalles
    public function mostrarDetalles() {
        echo "Nombre: " . $this->nombre . "\n";
        echo "Sueldo: " . $this->sueldo . " €\n";
        echo "Años de experiencia: " . $this->aniosExperiencia . "\n";
        echo "Bonus: " . $this->calcularBonus() . " €\n";
    }
}

class Consultor extends Empleado {
    public $horasPorProyecto;

    public function __construct($nombre, $sueldo, $aniosExperiencia, $horasPorProyecto) {
        parent::__construct($nombre, $sueldo, $aniosExperiencia);
        $this->horasPorProyecto = $horasPorProyecto;
    }

    public function calcularBonus() {
        $bonusBase = parent::calcularBonus();
        $bonusAdicional = 0;
        if ($this->horasPorProyecto > 100) {
            $bonusAdicional = 200;
        }
        return $bonusBase + $bonusAdicional;
    }

    public function mostrarDetalles() {
        parent::mostrarDetalles();
        echo "Horas por proyecto: " . $this->horasPorProyecto . "\n";
        echo "Bonus total: " . $this->calcularBonus() . " €\n";
    }
}

// Lo mostramos
echo "Empleado \n";
$empleado = new Empleado("Juan Luis Simancas Prundea", 1000, 3);
$empleado->mostrarDetalles();

echo "\nConsultor\n";
$consultor = new Consultor("Takion", 1500, 4, 100);
$consultor->mostrarDetalles();

echo "\nComparacion de bonificaciones:\n";
echo "Empleado: " . $empleado->calcularBonus() . " €\n";
echo "Consultor: " . $consultor->calcularBonus() . " €\n";
