<?php

class Carrito {
    //Creamos el carrito en modo privado 
    private $productos = [];

    // Agregamos el producto al carro
    public function agregarProducto($nombre, $precio, $cantidad) {
        foreach ($this->productos as &$producto) {
            if ($producto['nombre'] === $nombre) {
                $producto['cantidad'] += $cantidad;
                return;
            }
        }
        $this->productos[] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
        ];
    }

    // Quitamos el producto del carrito
    public function quitarProducto($nombre) {
        foreach ($this->productos as $index => $producto) {
            if ($producto['nombre'] === $nombre) {
                unset($this->productos[$index]);
                $this->productos = array_values($this->productos);
                return;
            }
        }
        echo "Ese producto no esta en el carrito\n";
    }

    // Calculamos el total de tosdos los productos juntos
    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
    }

    // Mostramos detalles del carrito
    public function mostrarDetalleCarrito() {
        if (empty($this->productos)) {
            echo "El carrito está vacío.\n";
            return;
        }

        echo "Productos en el carrito:\n";
        foreach ($this->productos as $producto) {
            echo "- " . $producto['nombre'] . 
                 " Precio: " . $producto['precio'] . " €" .
                 " Cantidad: " . $producto['cantidad'] .
                 " Subtotal: " . ($producto['precio'] * $producto['cantidad']) . " €\n";
        }
        echo "Total: " . $this->calcularTotal() . " €\n";
    }
}

// Lo mostramos
$carrito = new Carrito();

$carrito->agregarProducto("Torre", 800, 1);
$carrito->agregarProducto("Mouse", 25, 2);
$carrito->agregarProducto("Teclado", 40, 1);

echo " Carrito inicial \n";
$carrito->mostrarDetalleCarrito();

echo "\n Agregando otro mouse\n";
$carrito->agregarProducto("Mouse", 25, 1);
$carrito->mostrarDetalleCarrito();

echo "\n Quitando teclado \n";
$carrito->quitarProducto("Teclado");
$carrito->mostrarDetalleCarrito();

echo "\n Intentando quitar un producto inexistente \n";
$carrito->quitarProducto("Laptop");
