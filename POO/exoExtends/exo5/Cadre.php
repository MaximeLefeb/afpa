<?php

    include_once 'Employe.php';

    class Cadre extends Employe {
        private $indice;

        public function getIndice() :Int {
            return $this->indice;
        }
        public function setIndice(Int $indice) :Self {
            if ($indice > 4 || $indice < 0) {
                $this->indice = null;
                // Error
            }else {
                $this->indice = $indice;
                return $this;
            }
        }

        public function getSalaire() :?Float { 
            switch ($this->indice) {
                case  1:
                    return 13000;

                case  2:
                    return 15000;

                case  3:
                    return 17000;

                case  4:
                    return 20000;

                default :
                    return null;
                    
            }
        }
    }
?>