<?php
// This class will be extended by all our mappers and
// contains general purpose methods.
class Mapper
{
    /**
    * Transforms an object or objects to their mapped
    * associative arrays. No matter what mapper we
    * will use, the idea is to always call
    * Mapper_CLASS::get('CONTEXT', $objects)
    *
    * @param string $context The context
    * @param mixed $objects Array of objects or single object
    *
    * @return array Array of associative array or associative
    *               array
    */
    static function get($context, $objects) {
        if (is_array($objects)) {
            $result = array();
            foreach ($objects as $object) {
                $result[] = static::get($context, $object);
            }
            return $result;
        } else {
            return static::$context($objects);
        }
    }
    
    /**
    * Extracts specified properties of an object and
    * returns them as an associative array.
    *
    * @param object $object The object to convert
    * @param array $attributes The list of attributes to extract
    *
    * @return array The associative array
    */
    static function extract_properties($object, $properties) {
        $result = array();
        foreach ($properties as $property) {
            $result[$property] = $object->{$property};
        }
        return $result;
    }
}
