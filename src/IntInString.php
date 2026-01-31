<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Attribute;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class IntInString extends AbstractConstraintList
{
    protected function getConstraints(): array
    {
        return [
            new BreakOnFailure([
                new Type('string'),
                new Regex('/^[1-9]\d*$/'),
                new Callback(function (string $value, ExecutionContextInterface $context): void {
                    $intValue = (int)$value;
                    if ($value !== (string)$intValue) {
                        $context->addViolation('Passed string contains to big integer value');
                    }
                }),
            ])
        ];
    }
}
