<?php 

namespace Poo\classes;


class Conta{

public $numero;
protected $tipo;
private $dono;
private $saldo;
private $status;

	public function getNumero() {
		return $this->numero;
	}

	public function setNumero($numero) {
        $this->numero = $numero;
	}

	public function getTipo() {
		return $this->tipo;
	}

	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	public function getDono() {
		return $this->dono;
	}

	public function setDono($dono) {
		$this->dono = $dono;
	}

	public function getSaldo() {
		return $this->saldo;
	}

	public function setSaldo($saldo) {
		$this->saldo = $saldo;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

    public function abrirConta($dono, $tipo){
        $this->setDono($dono);
        $this->setTipo($tipo);
        $this->setSaldo($tipo==='C'?50.00:100.00);
        $this->setNumero(mt_rand(10000000,99999999));
        $this->setStatus(true);
    }

    public function fecharConta(){
        if($this->saldo > 0){
            return "Conta ainda possui saldo";
        }else if ($this->saldo < 0){
            return "Conta com saldo devedor";
        }else {
            $this->setStatus(false);
        }
    }

    public function depositar($valor){
        if($this->status){
            $this->setSaldo($this->saldo += $valor);
            return "Valor: $valor foi depositado.";
        }else {
            return "Conta desativada";
        }
    }

    public function sacar($valor){
        if($this->status){

            if($this->saldo > 0 && $this->saldo > $valor){
                $this->setSaldo($this->saldo -= $valor);
                return "Valor sacado: $valor,  Valor atual:{$this->saldo}";
            }else {
                return "Saldo insuficiente";  
            }

        }else {
            return "Conta desativada";
        }
    }

    public function pagarMensalidade(){
        if($this->status){

            $desconto = $this->tipo === "C" ? 10 : 3;

            if($this->saldo > 0 && $this->saldo > $desconto){
                $this->setSaldo($this->saldo -= $desconto);
            }else{
                return "Saldo insuficiente";
            }

        }else {
            return "Conta desativada";
        }
    }
}