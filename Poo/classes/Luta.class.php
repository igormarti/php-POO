<?php 

namespace Poo\classes;

require 'Lutador.class.php';

use Poo\classes\Lutador;

class Luta{

    /**
     * @var Lutador $desafiador
     */
    private $desafiador;
    /**
     * @var Lutador $desafiante
     */
    private $desafiante;
    /**
     * @var Boolean $aprovado
     */
    private $aprovado;
    /**
     * @var Number $rounds
     */
    private $rounds;

    public function getDesafiador(){
        return $this->desafiador;
    }
    
    public function setDesafiador($desafiador){
        $this->desafiador = $desafiador;
    }

    public function getDesafiante(){
        return $this->desafiante;
    }
    
    public function setDesafiante($desafiante){
        $this->desafiante = $desafiante;
    }

    public function getAprovado(){
        return $this->aprovado;
    }
    
    public function setAprovado($aprovado){
        $this->aprovado = $aprovado;
    }

    public function getRounds(){
        return $this->rounds;
    }
    
    public function setRounds($rounds){
        $this->rounds = $rounds;
    }

    /**
     * @param Lutador $desafiador
     * @param Lutador $desafiante
     * @param Number $rounds
     * @return void
     */
    public function MarcarLuta($desafiador,$desafiante, $rounds=2){

        if($desafiador->getCategoria() === $desafiante->getCategoria() && ($desafiador != $desafiante)){
            $this->setAprovado(true);
            $this->setDesafiador($desafiador);
            $this->setDesafiante($desafiante);
            $this->setRounds($rounds);
        } else {
            $this->setAprovado(false);
            $this->setDesafiador(null);
            $this->setDesafiante(null);
        }       
    }

    public function Lutar(){

        if($this->getAprovado()){

            $this->desafiador->apresentarLutador();
            $this->desafiante->apresentarLutador();

            $vitCountDesafiador = 0;
            $vitCountDesafiante = 0;
            $CountEmpates = 0;
            echo "---------------Luta--------------<br>";
            for($i =1; $i <= $this->rounds; $i++){
                $vencedor = rand(0,2);

                switch($vencedor){
                    case 1:
                        $vitCountDesafiador++;
                        echo "<p>".$this->desafiador->getNome()." venceu round $i </p> <br>";
                        break;
                    case 2:
                        $vitCountDesafiante++;
                        echo "<p>".$this->desafiante->getNome()." venceu round $i </p> <br>";
                        break;
                    default :
                        $CountEmpates++;
                        echo "<p>round $i Empatou</p> <br>";
                }
            }

            if($vitCountDesafiador > $vitCountDesafiante){
                echo "<p>".$this->desafiador->getNome()." venceu o desafio</p> <br>";
                $this->desafiador->ganharLuta();
                $this->desafiante->pederLuta();
            } else if($vitCountDesafiante > $vitCountDesafiador){
                echo "<p>".$this->desafiante->getNome()." venceu o desafio</p> <br>";
                $this->desafiante->ganharLuta();
                $this->desafiador->pederLuta();
            } else {
                $this->desafiante->empatarLuta();
                $this->desafiador->empatarLuta();
                echo "<p>Luta empatada Empatada</p> <br>";
            }

        } else {
            echo "<p> Luta não pode acontecer</p><br>";
        }       
    }
}