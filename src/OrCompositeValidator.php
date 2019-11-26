<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class OrCompositeValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof OrComposite) {
            throw new UnexpectedTypeException($constraint, OrComposite::class);
        }

        $validator = $this->context->getValidator();

        foreach ($constraint->constraints as $innerConstraint) {
            $errors = $validator->validate($value, $innerConstraint);
            if ($errors->count() === 0) {
                return;
            }
        }

        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ value }}', $this->formatValue($value))
            ->setInvalidValue($value)
            ->addViolation();
    }
}
