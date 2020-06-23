<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class AllUniqueValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof AllUnique) {
            throw new UnexpectedTypeException($constraint, AllUnique::class);
        }

        if (null === $value) {
            return;
        }

        if (!is_array($value)) {
            throw new UnexpectedValueException($value, 'array');
        }

        if (count($value) !== count(array_unique($value))) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}
