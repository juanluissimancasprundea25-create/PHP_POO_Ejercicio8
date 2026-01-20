<?php

class Personaje {
    public $nombre;
    public $nivel;
    public $puntosVida;
    public $puntosAtaque;
    private $vidaMaxima;

    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->nivel = 1;
        $this->puntosVida = 100;
        $this->puntosAtaque = 10;
        $this->vidaMaxima = 100;
    }

    // Funcion de atacar
    public function atacar(Personaje $objetivo) {
        if ($objetivo->puntosVida <= 0) {
            echo $objetivo->nombre . " Ya lo has matado tranquilizate XD\n";
            return;
        }
        $objetivo->puntosVida -= $this->puntosAtaque;
        if ($objetivo->puntosVida < 0) $objetivo->puntosVida = 0;
        echo $this->nombre . " ataca a " . $objetivo->nombre . 
             " y le causa " . $this->puntosAtaque . " puntos de daño. " .
             $objetivo->nombre . " tiene " . $objetivo->puntosVida . " PV restantes.\n";
    }

    // Funcion para curarse
    public function curarse() {
        $cura = 30;
        $this->puntosVida = min($this->vidaMaxima, $this->puntosVida + $cura);
        echo $this->nombre . " se cura y recupera $cura PV. Vida actual: " . $this->puntosVida . "\n";
    }

    // Funcion para subir de nivel
    public function subirNivel() {
        $this->nivel++;
        $this->puntosAtaque += 5;
        $this->vidaMaxima += 20;
        $this->puntosVida = $this->vidaMaxima; // Restaura vida al subir nivel
        echo $this->nombre . " ha subido al nivel " . $this->nivel . "!\n";
        echo "Ataque: " . $this->puntosAtaque . " | Vida máxima: " . $this->vidaMaxima . "\n";
    }
}

// Personajes
$heroe = new Personaje("Mordekaiser (de Lol)");
$villano = new Personaje("Sion (de Lol)");

$villano->subirNivel();
$villano->subirNivel();

echo "Inicio de la batalla \n";
echo "\n------------------------\n";
echo $heroe->nombre . " (Nivel " . $heroe->nivel . ") vs " . $villano->nombre . " (Nivel " . $villano->nivel . ")\n\n";

// Esta es la mini pelea que he dejado en una continuacion 
$heroe->atacar($villano);
$villano->atacar($heroe);
$heroe->curarse();
$heroe->atacar($villano);
$heroe->atacar($villano);

// Condiciones para saber quien gana o quien pierde
if ($villano->puntosVida <= 0) {
    echo "\n¡" . $heroe->nombre . " ha derrotado a " . $villano->nombre . "!\n";
} elseif ($heroe->puntosVida <= 0) {
    echo "\n¡" . $villano->nombre . " ha derrotado a " . $heroe->nombre . "!\n";
} else {
    echo "\nLa batalla continua...\n";
}
