<?php

namespace Alura\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class RepositorioAtores extends EntityRepository
{
    public function buscaAtoresMaisAtuantesOld()
    {
        return $this->createQueryBuilder('a')
            ->join('a.filmes', 'f')
            ->addSelect('f')
            ->getQuery()
            ->getResult();
    }

    public function buscaAtoresMaisAtuantes()
    {
        $sql = 'SELECT CONCAT(ator.primeiro_nome, \' \', ator.ultimo_nome) AS nome,
                       COUNT(filme.id_filme) qtd_filmes
                  FROM ator
                  JOIN ator_filme ON ator_filme.id_ator = ator.id_ator
                  JOIN filme ON filme.id_filme = ator_filme.id_filme
              GROUP BY ator.id_ator
			     LIMIT 2;';
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('nome', 'nome');
        $rsm->addScalarResult('qtd_filmes', 'qtdFilmes');

        return $this->getEntityManager()
            ->createNativeQuery($sql, $rsm)
            ->getResult();
    }
}
