<?php

namespace Touki\Depopulator\Annotation;

use Touki\Depopulator\DepopulatorAnnotation;
use Touki\Depopulator\PropertyMetadata;
use Touki\Depopulator\DeshydratorContextFactory;

/**
 * Getter Annotation
 * 
 * @Annotation
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class Getter implements DepopulatorAnnotation
{
    protected $value;

    /**
     * Constructor
     *
     * @param array $data Annotation Data
     */
    public function __construct(array $data)
    {
        if (!isset($data['value'])) {
            throw new \InvalidArgumentException(sprintf("No value specified for %s", get_class($this)));
        }

        $this->value = $data['value'];
    }

    /**
     * {@inheritDoc}
     */
    public function process(PropertyMetadata $metadata, DeshydratorContextFactory $factory)
    {
        $metadata->setGetter($this->value);
    }
}
