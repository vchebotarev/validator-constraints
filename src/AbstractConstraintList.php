<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Composite;

abstract class AbstractConstraintList extends Composite
{
    /**
     * @var Constraint[]
     */
    public array $constraints;

    abstract protected function getConstraints(): array;

    protected function initializeNestedConstraints(): void
    {
        $this->constraints = $this->getConstraints();
    }

    public function getCompositeOption(): string
    {
        return 'constraints';
    }

    public function validatedBy(): string
    {
        return AbstractConstraintListValidator::class;
    }
}
