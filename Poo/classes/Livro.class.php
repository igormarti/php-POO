<?php 

namespace Poo\classes;

use Poo\interfaces\Publicacao;

require 'interfaces/Publicacao.interface.php';
require_once 'Pessoa.class.php';

class Livro implements Publicacao {

    private $titulo;
    private $autor;
    private $totPaginas;
    private $pagAtual;
    private $aberto;
    private $leitor;

    public function __construct(String $titulo, String $autor, Int $totPaginas, Pessoa $leitor)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->totPaginas = $totPaginas;
        $this->leitor = $leitor;
        $this->pagAtual = 0;
        $this->aberto = false;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getTotPaginas(){
        return $this->totPaginas;
    }

    public function setTotPaginas($totPaginas){
        $this->totPaginas = $totPaginas;
    }

    public function getPagAtual(){
        return $this->pagAtual;
    }

    public function setPagAtual($pagAtual){
        $this->pagAtual = $pagAtual;
    }

    public function getAberto(){
        return $this->aberto;
    }

    public function setAberto($aberto){
        $this->aberto = $aberto;
    }

    public function getLeitor(){
        return $this->leitor;
    }

    public function setLeitor($leitor){
        $this->leitor = $leitor;
    }

    public function detalhes(){
        echo "########## Livro ###########<br>";
        echo "<p>Titulo:".$this->titulo." <p><br>";
        echo "<p>Autor:".$this->autor." <p><br>";
        echo "<p>Total Páginas:".$this->totPaginas." <p><br>";
        echo "<p>Página Atual:".$this->pagAtual." <p><br>";
        echo "<p>Está aberto? ".($this->aberto?"Sim":"Não")." <p><br>";
        echo "<p>Leito:".$this->leitor->getNome()." <p><br>";
    }

    function abrir(){
        $this->aberto = true;
    }

    function fechar(){
        $this->aberto = false;
    }

    function folhear($pagina){
        if($this->aberto){

            if($this->totPaginas < $pagina){
                $this->pagAtual = 0;
            }else {
                $this->pagAtual = $pagina;
            }

        }else {
            echo "<p>Livro fechado</p><br>";
        }
    }

    function avancarPagina(){
        if($this->aberto){
            $pagina = $this->pagAtual+1;
           
            if($pagina > $this->totPaginas){
                $this->pagAtual = 0;
            }else {
               
                $this->pagAtual = $pagina;
            }

        }else {
            echo "<p>Livro fechado</p><br>";
        }
    }

    function voltarPagina(){
        if($this->aberto){
            $pagina = $this->pagAtual-1;

            if($pagina < 0){
                $this->pagAtual = 0;
            }else {
                $this->pagAtual = $pagina;
            }

        }else {
            echo "<p>Livro fechado</p><br>";
        }
    }

}