<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class MessageValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if ($value == '' || mb_strlen($value) < 10)
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();

    }
}
