<?php

namespace Touki\Depopulator;

use Doctrine\Common\Annotations\Reader;

/**
 * Deshydrator context factory builds DeshydratorContext
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class DeshydratorContextFactory
{
    /**
     * Doctrine annotation reader
     * @var Reader
     */
    protected $reader;

    /**
     * Constructor
     *
     * @param Reader $reader Doctrine annotation reader
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }

    /**
     * Builds a context
     *
     * @param string $class A classname
     *
     * @return DeshydratorContext
     */
    public function build($class)
    {
        if (is_object($class)) {
            $class = get_class($class);
        }

        if (!class_exists($class)) {
            throw new \InvalidArgumentException(sprintf("Class %s does not exist", $class));
        }

        $context = new DeshydratorContext;
        $context->setClass($class);

        $reflection = new \ReflectionClass($class);

        foreach ($reflection->getProperties() as $property) {
            $annotations = $this->reader->getPropertyAnnotations($property);

            $metadata = new PropertyMetadata($property->getName());

            foreach ($annotations as $annotation) {
                if ($annotation instanceof DepopulatorAnnotation) {
                    $annotation->process($metadata, $this);
                }
            }

            $context->addProperty($metadata);
        }

        return $context;
    }
}
