<?php

namespace Touki\Depopulator;

/**
 * Base annotation for any depopulator annotation
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
interface DepopulatorAnnotation
{
    public function process(PropertyMetadata $metadata, DeshydratorContextFactory $factory);
}
