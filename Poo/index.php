<?php 

require 'classes/Caneta.class.php';
require 'classes/Conta.class.php';
require 'classes/ControleRemoto.class.php';

use Poo\classes\Caneta;
use Poo\classes\Conta;
use Poo\classes\ControleRemoto;

class Index{

    public function __construct()
    {
        $this->main();
    }

    public function main(){
        $caneta = new Caneta("Bic", 'Azul', 0.5);
     
        $caneta->rabiscar("oi");
        $caneta->destampar();
        $caneta->rabiscar("oi");
        echo "<pre>";
        print_r($caneta);

        $conta =  new Conta();
        $conta->abrirConta("Igor Martins","P");
        echo "<pre>";
        print_r($conta);
        $conta->depositar(220.50);
        print_r($conta);

        $controle = new ControleRemoto();
        $controle->ligar();
        $controle->abrirMenu();
    }

}

new Index();