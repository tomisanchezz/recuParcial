<?php

include "tienda.php";
include "producto.php";
include "Venta.php";

$producto1 = new producto(0001,"Nike","negro","XXL","Remera",3);
$producto2 = new producto(0002,"Adidas","rojo","XXL","Remera",10);
$producto3 = new producto(0003,"Nike","blanco","l","Remera",2);
$producto4 = new producto(0001,"Adidas","negro","m","Remera",5);

$colProductos = [$producto1,$producto2,$producto3,$producto4];

$objTienda= new Tienda("Zapatos Tomas","Forma 1630",2984409447,$colProductos,[]);

$arregloVentas = [ ["codigoBarra" => 0001, "cantidad" => 5], ["codigoBarra" => 0002, "cantidad" => 10], ["codigoBarra" => 0003, "cantidad" => 2] ];

$mod= $objTienda->realizarVenta($arregloVentas);

echo $mod;