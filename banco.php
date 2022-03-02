<?php



require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\CPF;
use Alura\Banco\Modelo\Conta\Conta;

$endereco = new Endereco ('Petrópolis', 'um bairro', 'minha rua', '71B');
$vinicius = new Titular (new CPF('123.456.789-10'), 'Vinicius Dias', $endereco);
$primeiraConta = new Conta($vinicius);
var_dump($primeiraConta);
$primeiraConta->deposita(500);
$primeiraConta->saca(300);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$helio = new Titular(new CPF('987.456.321-11'), 'Hélio Brandão', $endereco);
$segundaConta = new Conta($helio);
var_dump($segundaConta);

$outroEndereco = new Endereco ('Campinas', 'Guarani', 'Av. Uruguaiana', '80');
new Conta(new Titular(new CPF('123.321.456-10'),'Abcdefg', $outroEndereco));//como nao ha variavel apontando ele destroi
unset($segundaConta);
echo Conta::recuperaNumeroDeContas() . PHP_EOL;
