<?php

require_once 'src/Conta.php';

$primeiraConta = new Conta('123.456.789-10', 'Vinicius Dias');
var_dump($primeiraConta);
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$segundaConta = new Conta('987.456.321-11', 'Hélio Brandão');
var_dump($segundaConta);

new Conta('123','Abcdefg');//como nao ha variavel apontando ele destroi
unset($segundaConta);
echo Conta::recuperaNumeroDeContas() . PHP_EOL;
