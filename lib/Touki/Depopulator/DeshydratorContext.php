<?php

namespace Touki\Depopulator;

/**
 * Base context class for the Deshydrator
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class DeshydratorContext
{
    /**
     * Class to hydrate
     * @var string
     */
    protected $class;

    /**
     * Properties
     * @var array
     */
    protected $properties = array();

    /**
     * {@inheritDoc}
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set Class
     *
     * @param string $class Class to hydrate
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * Get Properties
     *
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * {@inheritDoc}
     */
    public function getProperty($name)
    {
        if (!isset($this->properties[$name])) {
            return;
        }

        return $this->properties[$name];
    }

    /**
     * Adds a property
     *
     * @param PropertyMetadata $property Property Metadata
     */
    public function addProperty(PropertyMetadata $property)
    {
        $this->properties[$property->getName()] = $property;
    }

    /**
     * Removes a property
     *
     * @param string $name Property name
     */
    public function removeProperty($name)
    {
        if (!isset($this->properties[$name])) {
            return;
        }

        unset($this->properties[$name]);
    }
}
