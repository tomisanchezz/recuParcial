<?php
include "Items.php";
class venta{

    private $fecha;
    private $cliente;
    private $numeroFactura;
    private $tipoComprobante;
    private $collItems;

    public function __construct($fecha, $cliente, $numeroFactura, $tipoComprobante, $collItemsC) {
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->numeroFactura = $numeroFactura;
        $this->tipoComprobante = $tipoComprobante;
        $this->collItems = $collItemsC;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getNumeroFactura() {
        return $this->numeroFactura;
    }

    public function getTipoComprobante() {
        return $this->tipoComprobante;
    }

    public function getCollItems() {
        return $this->collItems;
    }

    // Setters
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setNumeroFactura($numeroFactura) {
        $this->numeroFactura = $numeroFactura;
    }

    public function setTipoComprobante($tipoComprobante) {
        $this->tipoComprobante = $tipoComprobante;
    }

    public function setCollItems($collItems) {
        $this->collItems = $collItems;
    }
    public function coItems(){
        $itemsString = "";
        $a=$this->getCollItems();
        foreach ($a as $item) {
            $itemsString .= $item . "\n";
        }
        return  $itemsString;
    }
    public function __toString() {
        

        return "Fecha: " . $this->fecha . "\n" .
               "Cliente: " . $this->cliente . "\n" .
               "Número de Factura: " . $this->numeroFactura . "\n" .
               "Tipo de Comprobante: " . $this->tipoComprobante . "\n" .
               "Items: \n" .$this->coItems();
    }

    public function incorporarProducto ($unObjProducto,$cantidadAVender){
        $colItems= $this->getCollItems();
        $stock= $unObjProducto->getCantidadStock();
        if( $stock  >= $cantidadAVender){
            $itemNuevo= new Items($cantidadAVender,$unObjProducto);
            $colItems[]=$itemNuevo;
            $stockRestante= $stock - $cantidadAVender;
            $unObjProducto->actualizarStock($stockRestante);
            $retornar=$unObjProducto;
        }else{
            $retornar = null;
        }
        return $retornar;
    }


}