<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NoSpecificDomainValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\NoSpecificDomain */

        if (null === $value || '' === $value) {
            return;
        }

        // Extraer el dominio del correo electrónico
        $domain = substr(strrchr($value, "@"), 1);

        // Comprobar si el dominio es "example.com"
        if ($domain === 'example.com') {
            // Añadir una violación del constraint
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ domain }}', $domain)
                ->addViolation();
        }
    }
}