<?php

class Conta
{
    
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo = 0;
    private static $numeroDeContas = 0; //atributo da classe em si nao das instâncias

    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this->cpfTitular = $cpfTitular;
        $this->validaNomeTitular($nomeTitular);
        $this->nomeTitular = $nomeTitular;
        $this->saldo = 0;
        self::$numeroDeContas++;//acessamos atributos ou métodos estáticos.

    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function saca(float $valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function transfere(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }
//após a criação do construtor os métodos defineNomeTitular e defineCpfTitular não são mais necessários
    // public function defineCpfTitular(string $cpf): void //setCpfTitular
    // {
    //     $this->cpfTitular = $cpf;
    // }

    // public function defineNomeTitular(string $nome): void
    // {
    //     $this->nomeTitular = $nome;
    // }

    public function recuperaSaldo(): float //getSaldo
    {
        return $this->saldo;
    }

    public function recuperaCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    public function recuperaNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    private function validaNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular) < 5){
            echo "Nome precisa ter ao menos 5 caracteres" . PHP_EOL;
            exit();
        }
    }
    
    public static function recuperaNumeroDeContas(): int 
    {
        return self::$numeroDeContas;
    }

}