<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class KeyExists extends Constraint
{
    /**
     * @var string
     */
    public $message = 'This value does not have key "{{ key }}".';

    /**
     * @var mixed
     */
    public $key;

    public function getDefaultOption()
    {
        return 'key';
    }
}
