<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class BreakOnFailureValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof BreakOnFailure) {
            throw new UnexpectedTypeException($constraint, BreakOnFailure::class);
        }

        $validator = $this->context->getValidator()->inContext($this->context);
        $violationCountPrevious = $this->context->getViolations()->count();

        foreach ($constraint->constraints as $constraintItem) {
            $validator->validate($value, $constraintItem);
            if ($violationCountPrevious !== $this->context->getViolations()->count()) {
                return;
            }
        }
    }
}
