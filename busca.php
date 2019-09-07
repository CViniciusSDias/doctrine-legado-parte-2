<?php

use Alura\Doctrine\Entity\Ator;
use Alura\Doctrine\Entity\Filme;

require_once 'vendor/autoload.php';

$debug = new \Doctrine\DBAL\Logging\DebugStack();

$em = (new \Alura\Doctrine\Helper\EntityManagerCreator())->criaEntityManager();
$em->getConfiguration()->setSQLLogger($debug);

$repositorioAtores = $em->getRepository(Ator::class);

$atoresMaisAtuantes = $repositorioAtores->findAll();

foreach ($atoresMaisAtuantes as $ator) {
    echo "O(a) ator/atriz {$ator->getNome()} atuou em {$ator->quantidadeFilmes()} filmes" . PHP_EOL;
}


foreach ($debug->queries as $query) {
    var_dump($query);
}