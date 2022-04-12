<?php 

namespace Poo\classes;

class Caneta{

    private $modelo;
    private $cor;
    private $ponta;
    private $carga = 100;
    private $tampada = true;

    public function __construct($modelo, $cor, $ponta){
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ponta = $ponta;
    }

    function getModelo(){
        return $this->modelo;
    }

    function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function getCor(){
        return $this->cor;
    }

    public function setCor($cor){
        $this->cor = $cor;
    }

    
    function getPonta(){
        return $this->ponta;
    }

    function setPonta($ponta){
        $this->ponta = $ponta;
    }

    function getCarga(){
        return $this->carga;
    }

    function setCarga($carga){
        if($carga > 100){
            $this->carga = 100;
        }else if($carga < 0){
            $this->carga = 0;
        }else{
            $this->carga = $carga;
        }       
    }  

    function tampar(){
        $this->tampada = true;
    }

    function destampar(){
        $this->tampada = false;
    }

    function rabiscar($texto){
        if($this->carga<1){
            echo "Caneta vázia";
            return;
        }

        if(!$this->tampada){
            echo $texto."<br>";
            $this->carga -= 2;
        }else {
            echo "destampe a caneta <br>";
        }
    } 
}