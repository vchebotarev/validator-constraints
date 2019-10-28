<?php

namespace Chebur\Validator\Constraint;

use Symfony\Component\Validator\Constraints\All;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class AllKey extends All
{

}
