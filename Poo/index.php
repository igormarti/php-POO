<?php 

require 'classes/Caneta.class.php';
require 'classes/Conta.class.php';
require 'classes/ControleRemoto.class.php';
require 'classes/Luta.class.php';
require 'classes/Pessoa.class.php';
require 'classes/Livro.class.php';

use Poo\classes\Caneta;
use Poo\classes\Conta;
use Poo\classes\ControleRemoto;
use Poo\classes\Livro;
use Poo\classes\Luta;
use Poo\classes\Lutador;
use Poo\classes\Pessoa;

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

        $l1 = new Lutador("Zezinho","Brasil",29, 1.80, 65.3, 10, 2, 1);
        $l2 = new Lutador("Lukitu","Argentina", 32, 1.78, 62.3, 8, 1, 5);

        $luta1 =  new Luta();
        $luta1->MarcarLuta($l1, $l2);
        $luta1->Lutar();

        $pessoa =  new Pessoa("Igor", "M", 25);
        $pessoa->fazerAniversario();
        $livro = new Livro("Livro de PHP", " Pablo Dall’Oglio", 350, $pessoa);

        $livro->abrir();
        $livro->avancarPagina();
        $livro->folhear(40);
        $livro->detalhes();
    }

}

new Index();