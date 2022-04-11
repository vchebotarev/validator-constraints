<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;

/**
 * @Annotation
 */
class PostgresInt extends AbstractConstraintList
{
    protected function getConstraints(): array
    {
        return [
            new GreaterThanOrEqual(-2147483648),
            new LessThanOrEqual(2147483647),
        ];
    }
}
