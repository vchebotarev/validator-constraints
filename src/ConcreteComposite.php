<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Composite;

abstract class ConcreteComposite extends Composite
{
    /**
     * @var Constraint[]
     */
    public $constraints;

    abstract protected function getConstraints(): array;

    protected function initializeNestedConstraints()
    {
        $this->constraints = $this->getConstraints();
    }

    public function getCompositeOption()
    {
        return 'constraints';
    }

    public function validatedBy()
    {
        return ConcreteCompositeValidator::class;
    }
}
