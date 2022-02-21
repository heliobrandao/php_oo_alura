<?php

require_once 'src/Conta.php';
require_once 'src/Titular.php';
require_once 'src/CPF.php';


$vinicius = new Titular (new CPF('123.456.789-10'), 'Vinicius Dias');
$primeiraConta = new Conta($vinicius);
var_dump($primeiraConta);
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$helio = new Titular(new CPF('987.456.321-11'), 'Hélio Brandão');
$segundaConta = new Conta($helio);
var_dump($segundaConta);

new Conta(new Titular(new CPF('123.321.456-10'),'Abcdefg'));//como nao ha variavel apontando ele destroi
unset($segundaConta);
echo Conta::recuperaNumeroDeContas() . PHP_EOL;
