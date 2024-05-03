<?php

class producto{

    private $talle;
    private $color;
    private $marca;
    private $cantidadStock;
    private $codigoBarra;
    private $descripcion;

    public function __construct($codigoBarraC,$marcaC,$colorC,$talleC,$descripcionC,$cantidadStockC){
        $this->codigoBarra = $codigoBarraC;
        $this->marca = $marcaC;
        $this->color = $colorC;
        $this->talle = $talleC;
        $this->descripcion = $descripcionC;
        $this->cantidadStock = $cantidadStockC;
    }

    public function getCodigoBarra() {
        return $this->codigoBarra;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getColor() {
        return $this->color;
    }

    public function getTalle() {
        return $this->talle;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCantidadStock() {
        return $this->cantidadStock;
    }
    public function setCodigoBarra($codigoBarra) {
        $this->codigoBarra = $codigoBarra;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setTalle($talle) {
        $this->talle = $talle;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCantidadStock($cantidadStock) {
        $this->cantidadStock = $cantidadStock;
    }

    public function __toString()
    {
      return 
      "Codigo de barra: " .$this->getCodigoBarra()."\n".
      "Marca: ".$this->getMarca()."\n".
      "Color: " .$this->getColor()."\n".
      "Talle: ".$this->getTalle()."\n".
      "Descripcion: " .$this->getDescripcion()."\n".
      "Cantidad Stock: ".$this->getCantidadStock();
    }
    public function actualizarStock($cantStock){
        if($cantStock > 0 ){
            $cantStockFinal= $this->getCantidadStock() + $cantStock;
        }else{
            $cantStockFinal = $this->getCantidadStock() - $cantStock;
        }
        $this->setCantidadStock($cantStockFinal);
    }
}
