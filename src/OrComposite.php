<?php

namespace Chebur\Validator\Constraint;

use Symfony\Component\Validator\Constraints\Composite;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class OrComposite extends Composite
{
    /**
     * @var string
     */
    public $message = 'This value is not valid.';

    /**
     * @var array
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

    protected function getCompositeOption()
    {
        return 'constraints';
    }
}
