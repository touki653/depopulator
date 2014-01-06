<?php

namespace Touki\Depopulator;

/**
 * Known metadata for properties.
 * Basically, a list of getters and getters for each annotations
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class PropertyMetadata
{
    /**
     * Getter
     * @var string
     */
    protected $getter;

    /**
     * Context
     * @var DeshydratorContext
     */
    protected $context;

    /**
     * Ignored
     * @var boolean
     */
    protected $ignored = false;

    /**
     * Property name
     * @var string
     */
    protected $name;

    /**
     * Constructor
     *
     * @param string $name Property name
     */
    public function __construct($name)
    {
        $this->name   = $name;
        $this->getter = sprintf("get%s", $name);
    }

    /**
     * Get Name
     *
     * @return string Property name
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set Name
     *
     * @param string $name Property name
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get Getter
     *
     * @return string Getter name
     */
    public function getGetter()
    {
        return $this->getter;
    }
    
    /**
     * Set Getter
     *
     * @param string $getter Getter name
     */
    public function setGetter($getter)
    {
        $this->getter = $getter;
    
        return $this;
    }

    /**
     * Get Context
     *
     * @return HydratorContextInterface Context
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set Context
     *
     * @param DeshydratorContext $context Context
     */
    public function setContext(DeshydratorContext $context)
    {
        $this->context = $context;
    }

    /**
     * Set Ignored
     *
     * @param boolean $ignored Whether to ignore the property
     */
    public function setIgnored($ignored)
    {
        $this->ignored = !!$ignored;
    }

    /**
     * Is Ignored
     *
     * @return boolean
     */
    public function isIgnored()
    {
        return $this->ignored;
    }
}
