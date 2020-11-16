<?php 
    interface commonFunction {
        public function add(Object $AddItem) :Void;

        public function modif(Object $ModifiedItem) :Void;

        public function delete(Int $id) :Void;

        public function searchById(String $id) :?Array;

        public function searchAll() :Array;
        
    }
?>