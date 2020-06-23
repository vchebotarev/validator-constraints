<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class AllUnique extends Constraint
{
    /**
     * @var string
     */
    public $message = 'This array must contain only unique elements';
}
