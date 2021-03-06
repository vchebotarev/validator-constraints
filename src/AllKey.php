<?php

declare(strict_types=1);

namespace Chebur\Validator\Constraints;

use Symfony\Component\Validator\Constraints\All;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class AllKey extends All
{

}
