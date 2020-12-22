<?php 

namespace App\Service\interfaceProduit;

interface ProductInterface {
    public function addProduct(Object $produit) :Void;

    public function modifProduct() :Void;

    public function showProducts() :?Array;
    
    public function delProduct(Object $id) :Void;

    public function buyProduct(Object $id) :Void;
}