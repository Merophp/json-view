<?php
namespace Merophp\JsonViewPlugin\Serializer;

use JsonException;

class JsonSerializer{

    /**
     * Returns the JSON representation of a value
     *
     * @param mixed $value The value being encoded. Can be any type except a resource.
     * @param int $depth Set the maximum depth. Must be greater than zero.
     * @return string|false
     * @throws JsonException
     */
    public static function serialize($value, int $depth = 512)
    {
        return json_encode($value, JSON_THROW_ON_ERROR, $depth);
    }

}
