<?php

class Tarea {
    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    // Cambiamos a completada la tarea
    public function marcarComoCompletada() {
        if ($this->estado != "Completada") {
            echo "Cambiando estado de la tarea..." . $this->estado = "Completada" ."\n";
        }
    }

    // Cambiamos la descripcion de la tarea
    public function editarDescripcion() {
        if ($this->descripcion = "Hacer PHP"){
            ECHO "La nueva tarea es :" . $this->descripcion = "Hacer docker" . "\n";
        }
    }

    // Mostramos la tarea
    public function mostrarTarea() {
        echo "Nombre: " . $this->nombre . "\n";
        echo "Descripcion de la tarea: " . $this->descripcion . "\n";
        echo "Fecha limite de la tarea: " . $this->fechaLimite . "\n";
        echo "Estado de la tarea: " . $this->estado . "\n";
    }
}

$mitarea = new Tarea();
$mitarea->nombre = "Juan Luis Simancas Prundea";
$mitarea->descripcion = "Hacer PHP";
$mitarea->fechaLimite = "21/01/2026";
$mitarea->estado = "Pendiente";

//Lo mostramos
$mitarea->marcarComoCompletada();
echo "\n--------------------\n";
$mitarea->editarDescripcion();
echo "\n--------------------\n";
echo "Informacion de la cuenta:\n";
$mitarea->mostrarTarea();
