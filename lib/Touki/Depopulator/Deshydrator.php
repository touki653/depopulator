<?php

namespace Touki\Depopulator;

use Touki\Depopulator\Exception\DeshydratationException;

/**
 * Deshydrator
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class Deshydrator
{
    /**
     * Deshydrates an object
     *
     * @param object             $object  Object to deshydrate
     * @param DeshydratorContext $context Context
     *
     * @return array
     */
    public function deshydrate($object, DeshydratorContext $context)
    {
        $deshydrated = array();

        foreach ($context->getProperties() as $property) {
            if ($property->isIgnored()) {
                continue;
            }

            $name   = $property->getName();
            $caller = array($object, $property->getGetter());

            if (!method_exists($object, $property->getGetter())) {
                if (!array_key_exists($name, get_object_vars($object))) {
                    throw new DeshydratationException(sprintf(
                        "Undefined getter method %s::%s for property '%s'",
                        get_class($object),
                        $property->getGetter(),
                        $name
                    ));
                }

                $caller = function() use ($object, $name) {
                    return $object->$name;
                };
            }

            $value = call_user_func_array($caller, array());

            if (null !== $property->getContext()) {
                $value = $this->deshydrate($value, $property->getContext());
            }

            $deshydrated[$name] = $value;
        }

        return $deshydrated;
    }
}
