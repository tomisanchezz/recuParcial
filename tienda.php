<?php
include_once "Venta.php";
class Tienda{

    private $nombre;
    private $direccion;
    private $telefono;
    private $colProductos;
    private $colVentas;

    public function __construct($nombreC,$direccionC,$telefonoC,$colProductosC,$colVentasC){
        $this->nombre = $nombreC;
        $this->direccion = $direccionC;
        $this->telefono = $telefonoC;
        $this->colProductos = $colProductosC;
        $this->colVentas = $colVentasC;
        
    }

    public function getColProductos(){
        return $this->colProductos;
    }
    public function getColVentas(){
        return $this->colVentas;
    }
    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function stringColProductos(){
        $salida="";
        $colProdc= $this->getColProductos();
        foreach($colProdc as $producto ){
            $salida .= $producto;
        }
        return $salida;
    }
    public function stringVentas(){
        $salida="";
        $colVenta= $this->getColVentas();
        foreach($colVenta as $venta){
            $salida .= $venta;
        }
        return $salida;
    }
    public function __toString() {
        return 
        "Nombre: ". $this->getNombre(). "\n" . 
        "Direccion: ".$this->getDireccion(). "\n" .
        "Telefono".$this->getTelefono(). "\n" .
        "Col Productos: ".$this->stringColProductos(). "\n" .
        "Col Ventas: ".$this->stringVentas(). "\n";
    }


    public function buscarProducto($codigoBarra) {
        $productosColecc = $this->getColProductos();
        $i = 0;
        $bandera = false;
        $barraEncontrado=-1;
        while ($i < count($productosColecc) && !$bandera) {
            if ($codigoBarra == $productosColecc[$i]->getCodigoBarra()) {
                $barraEncontrado = $i;
                $bandera=true;
            }
            $i++;
        }
        return $barraEncontrado;

    }

    public function realizarVenta($arregloVentas) {
        $itemsVendidos = [];
        foreach ($arregloVentas as $venta) {
            $codigoBarra = $venta["codigoBarra"];
            $cantidadAVender = $venta["cantidad"];

            $producto = $this->buscarProducto($codigoBarra);
            $coleccionProductos = $this->getColProductos();
            $i = 0;
            $encontrado = false;
            while ($i < count($coleccionProductos) && $encontrado == false) {
                if ($i == $producto) {
                    $encontrado = true;
                    $productoEncontrado = $coleccionProductos[$i];
                }
                $i++;
            }
            if ($producto != -1 ) {
                $item = new Items($producto , $cantidadAVender);
                $itemsVendidos[] = $item;
                $venta = new Venta("6 enero", "Tomas", rand(), "comprobante c", $itemsVendidos);
                $venta->incorporarProducto($productoEncontrado , $cantidadAVender); 
            } 
        }

        return $venta;
    }
 


}