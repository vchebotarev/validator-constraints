<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class ConcreteCompositeValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ConcreteComposite) {
            throw new UnexpectedTypeException($constraint, ConcreteComposite::class);
        }

        $validator = $this->context->getValidator()->inContext($this->context);

        foreach ($constraint->constraints as $innerConstraint) {
            $validator->validate($value, $innerConstraint);
        }
    }
}
