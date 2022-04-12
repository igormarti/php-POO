<?php 

namespace Poo\classes;

class Lutador{

    private $nome;
    private $nacionalidade;
    private $idade;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;

    public function __construct($no, $na, $id, $al, $pe, $ca, $vi, $de, $em)
    {   
        $this->setNome($no);
        $this->setNacionalidade($na);
        $this->setIdade($id);
        $this->setAltura($al);
        $this->setPeso($pe);
        $this->setCategoria($ca);
        $this->setVitorias($vi);
        $this->setDerrotas($de);
        $this->setEmpates($em);
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNacionalidade(){
        return $this->nacionalidade;
    }

    public function setNacionalidade($nacionalidade){
        $this->nacionalidade = $nacionalidade;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($idade){
        $this->idade = $idade;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function setAltura($altura){
        $this->altura = $altura;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function setPeso($peso){
        $this->peso = $peso;
        $this->setCategoria();
    }

    public function getCategoria(){
        return $this->categoria;
    }

    private function setCategoria(){
        if($this->getPeso() < 52.2){
            $this->categoria = "Inválido";
        }else if($this->getPeso() <= 70.3){
            $this->categoria = "Leve";
        }else if($this->getPeso() <= 83.9){
            $this->categoria = "Médio";
        }else if($this->getPeso() <= 120.2){
            $this->categoria = "Pesado";
        }else {
            $this->categoria = "Inválido";
        }
    }

    public function getVitorias(){
        return $this->vitorias;
    }

    public function setVitorias($vitorias){
        $this->vitorias = $vitorias;
    }

    public function getDerrotas(){
        return $this->derrotas;
    }

    public function setDerrotas($derrotas){
        $this->derrotas = $derrotas;
    }

    public function getEmpates(){
        return $this->empates;
    }

    public function setEmpates($empates){
        $this->empates = $empates;
    }

    public function apresentarLutador(){
        echo "<p>------------------------------</p>";
        echo "<br><p>CHEGOU A HORA, o lutado ".$this->getNome()."</p>";
        echo "<br><p>veio diretamente da(e) ".$this->getNacionalidade()."</p>";
        echo "<br><p>sua idade é: ".$this->getIdade()."</p>";
        echo "<br><p>e pesa: ".$this->getPeso()." Kg</p>";
        echo "<br><p>ele tem: ".$this->getVitorias()." vitórias</p>";
        echo "<br><p>e ".$this->getDerrotas()." derrotas</p>";
        echo "<br><p>e também ".$this->getEmpates()." empates</p>";

    }

    public function statusLutador(){
        echo "<p>------------------------------</p>";
        echo "<br><p>".$this->getNome()." é um peso ".$this->getCategoria()."</p>";
        echo "<br><p> e já ganhou ".$this->getVitorias()." vezes</p>";
        echo "<br><p> perdeu ".$this->getDerrotas()." vezes</p>";
        echo "<br><p> e empatou ".$this->getEmpates()." vezes</p>";
    }  
    
    public function ganharLuta(){
        $this->setVitorias($this->getVitorias()+1);
    }

    public function pederLuta(){
        $this->setDerrotas($this->getDerrotas()+1);
    }

    public function empatarLuta(){
        $this->setEmpates($this->getEmpates()+1);
    }
}