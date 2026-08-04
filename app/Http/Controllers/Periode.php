<?php

class Periode {
    private $datedebut ;
    private $datefin ;

    public function __construct($datedebut , $datefin) {


            $this->datedebut = $datedebut;
            $this->datefin = $datefin;
    }


    public function dureeEnJours() : int 
    {
        return $this->datedebut->diff($this->datefin);
    }

    public function contient($date) {
        return ($date >= $this->datedebut && $date <= $this->datefin) ;
}

}





?>