<?php

use Merophp\JsonViewPlugin\Serializer\JsonSerializer;
use PHPUnit\Framework\TestCase;

class JsonSerializableDummy implements JsonSerializable{

    public function jsonSerialize()
    {
        return 'Hello';
    }
}

class JsonSerializerTest extends TestCase
{
    public function testSerialize(){
        $return = JsonSerializer::serialize(['foo' => 'bar']);
        $this->assertEquals('{"foo":"bar"}', $return);

        $return = JsonSerializer::serialize(['foo' => ['foo' => 'bar']]);
        $this->assertEquals('{"foo":{"foo":"bar"}}', $return);

        $return = JsonSerializer::serialize(['foo' => new JsonSerializableDummy()]);
        $this->assertEquals('{"foo":"Hello"}', $return);
    }
}
