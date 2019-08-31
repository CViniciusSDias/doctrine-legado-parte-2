<?php

namespace Alura\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping\MappingException;

class TipoClassificacao extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'CLASSIFICACAO';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!in_array($value, ['G', 'PG', 'PG-13', 'R', 'NC-17'])) {
            throw new MappingException('Classificação inválida');
        }

        return $value;
    }

    public function getName()
    {
        return 'classificacao';
    }
}
