<?php

use Merophp\JsonViewPlugin\JsonView;
use PHPUnit\Framework\TestCase;

/**
 * @covers JsonView
 */
class JsonViewTest extends TestCase
{
    public function testAll(){
        $jsonView = new JsonView;
        $jsonView->json(['foo' => 'bar']);
        $this->assertEquals('{"foo":"bar"}', $jsonView->render());
        $this->assertEquals('application/json;charset=utf-8', $jsonView->getContentType());
    }
}
