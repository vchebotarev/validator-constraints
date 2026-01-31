<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AbstractConstraintListValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (!$constraint instanceof AbstractConstraintList) {
            throw new UnexpectedTypeException($constraint, AbstractConstraintList::class);
        }

        $validator = $this->context->getValidator()->inContext($this->context);

        foreach ($constraint->constraints as $innerConstraint) {
            $validator->validate($value, $innerConstraint);
        }
    }
}
