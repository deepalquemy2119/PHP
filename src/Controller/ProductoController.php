<?php
require_once '../src/Model/Producto.php';

class ProductoController {
    private $productoModel;

    public function __construct($pdo) {
        $this->productoModel = new Producto($pdo);
    }

    public function listar() {
        $productos = $this->productoModel->getAll();
        require '../src/View/producto/listado.php';
    }

    public function detalle($id) {
        $producto = $this->productoModel->getById($id);
        require '../src/View/producto/detalle.php';
    }
}
?>
