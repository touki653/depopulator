<?php

namespace Touki\Depopulator\Annotation;

use Touki\Depopulator\DepopulatorAnnotation;
use Touki\Depopulator\PropertyMetadata;
use Touki\Depopulator\DeshydratorContextFactory;

/**
 * Annotation class to ignore setting of the property
 * 
 * @Annotation
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class Ignore implements DepopulatorAnnotation
{
    /**
     * {@inheritDoc}
     */
    public function process(PropertyMetadata $metadata, DeshydratorContextFactory $factory)
    {
        $metadata->setIgnored(true);
    }
}
