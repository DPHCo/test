<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NoSpecificDomain extends Constraint {
    public $message = 'The email domain "{{ domain }}" is not allowed.';
}