<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Composite;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class BreakOnFailure extends Composite
{
    /**
     * @var Constraint[]
     */
    public $constraints;

    public function getDefaultOption()
    {
        return 'constraints';
    }

    public function getRequiredOptions()
    {
        return ['constraints'];
    }

    public function getCompositeOption()
    {
        return 'constraints';
    }
}
