<?php
    
    include_once 'Employe.php';
    include_once 'DateUtility.php';

    class Ouvrier extends Employe{
        private $dateEmbauche;
        protected static $smic = 2500;
        
        public function getDateEmbauche() :Date{
            return $this->embauche;
        }
        public function setDateEmbauche(Date $embauche) :Self {
            $this->embauche = $embauche;
            return $this;
        }
        
        public function getSalaire() :Float{
            $ancienete = DateUtility::getDifferenceInYears(new Datetime(), $this->dateEmbauche):
            $salaire = Ouvrier::$smic + $ancienete * 100;

            if ($salaire > Ouvrier::$smic * 2) {
                return 5000;
            } else {
                return $salaire;
            }

            //* return min(self::$smic*2, $salaire);
        }

        public function __toString(){
            return "[embauche] -> " . $embauche;
        }
    } 
?>