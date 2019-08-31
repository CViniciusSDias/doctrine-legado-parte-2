<?php

use Alura\Doctrine\Entity\Filme;

require_once 'vendor/autoload.php';

$em = (new \Alura\Doctrine\Helper\EntityManagerCreator())->criaEntityManager();

/** @var Filme[] $filmes */
$filmes = $em->getRepository(Filme::class)->findAll();

foreach ($filmes as $filme) {
    echo $filme->getTitulo() . PHP_EOL . 'Idioma: ' . $filme->getIdiomaAudio();
    echo PHP_EOL;
    echo PHP_EOL;

    echo implode(', ', $filme->getAtores());
}