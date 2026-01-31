<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Attribute;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class KeyExists extends Constraint
{
    public string $message = 'This value does not have key "{{ key }}".';

    public mixed $key;

    public function getDefaultOption(): ?string
    {
        return 'key';
    }
}
