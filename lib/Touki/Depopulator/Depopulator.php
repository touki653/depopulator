<?php

namespace Touki\Depopulator;

use Doctrine\Common\Annotations\AnnotationReader;

/**
 * Main class for depopulation
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class Depopulator
{
    /**
     * Deshydrator
     * @var Deshydrator
     */
    protected $deshydrator;

    /**
     * Factory
     * @var DeshydratorContextFactory
     */
    protected $factory;

    /**
     * Constructor
     *
     * @param Deshydrator               $deshydrator A deshydrator
     * @param DeshydratorContextFactory $factory     A deshydrator context factory
     */
    public function __construct(Deshydrator $deshydrator = null, DeshydratorContextFactory $factory = null)
    {
        $this->deshydrator = $deshydrator ?: new Deshydrator;
        $this->factory     = $factory     ?: new DeshydratorContextFactory(new AnnotationReader);
    }

    /**
     * Depopulates an object
     *
     * @param object $object Object instance
     *
     * @return array Depopulated object
     */
    public function depopulate($object)
    {
        if (!is_object($object)) {
            throw new \InvalidArgumentException(sprintf(
                "Invalid depopulation argument given. Expected object, got %s",
                gettype($object)
            ));
        }

        $context = $this->factory->build($object);

        return $this->deshydrator->deshydrate($object, $context);
    }
}
