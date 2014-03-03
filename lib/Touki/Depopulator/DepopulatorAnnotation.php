<?php

namespace Touki\Depopulator;

/**
 * Base annotation for any depopulator annotation
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
interface DepopulatorAnnotation
{
    /**
     * Proccesses the given metadata
     *
     * @param PropertyMetadata          $metadata Property to modify
     * @param DeshydratorContextFactory $factory  Factory which allows to build recursively
     */
    public function process(PropertyMetadata $metadata, DeshydratorContextFactory $factory);
}
