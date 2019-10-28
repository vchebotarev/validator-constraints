<?php

namespace Chebur\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Traversable;

class AllKeyValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof AllKey) {
            throw new UnexpectedTypeException($constraint, AllKey::class);
        }

        if (null === $value) {
            return;
        }

        if (!is_array($value) && !$value instanceof Traversable) {
            throw new UnexpectedTypeException($value, 'iterable');
        }

        $validator = $this->context->getValidator()->inContext($this->context);

        foreach ($value as $key => $element) {
            $validator->atPath('['.$key.']')->validate($key, $constraint->constraints);
        }
    }
}
