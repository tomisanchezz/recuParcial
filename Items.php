
<?php

class Items{
    private $cantVendida;
    private $refProducto;


    public function __construct($cantVendidaC,$refProductoC)
    {
        $this->cantVendida = $cantVendidaC;
        $this->refProducto = $refProductoC;
    }
    public function __toString()
    {
        return 
        "Cantidad vendida: ". $this->getCantVendida().
        "Ref produitcto:" . $this->getRefProducto();
    }

    public function getCantVendida() {
        return $this->cantVendida;
    }

    // Método setter para $cantVendida
    public function setCantVendida($cantVendida) {
        $this->cantVendida = $cantVendida;
    }

    // Método getter para $refProducto
    public function getRefProducto() {
        return $this->refProducto;
    }

    // Método setter para $refProducto
    public function setRefProducto($refProducto) {
        $this->refProducto = $refProducto;
    }
}
