<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class KeyExistsValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof KeyExists) {
            throw new UnexpectedTypeException($constraint, KeyExists::class);
        }

        if (null === $value) {
            return;
        }

        if (!is_array($value)) {
            throw new UnexpectedValueException($value, 'array');
        }

        if (!array_key_exists($constraint->key, $value)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ key }}', $constraint->key)
                ->addViolation();
        }
    }
}
