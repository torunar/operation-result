<?php

namespace Tests\Torunar\OperationResult;

use PHPUnit\Framework\TestCase;
use Torunar\OperationResult\OperationResult;

class OperationResultTest extends TestCase
{
    public function testIsSuccessful()
    {
        $this->assertTrue((new OperationResult(true))->isSuccessful());
        $this->assertFalse((new OperationResult(false))->isSuccessful());
    }

    public function testSetGetData()
    {
        $result = new OperationResult();

        $result->setData(42);
        $this->assertEquals([42], $result->getData());

        $result->setData(42, 'meaning_of_life');
        $this->assertEquals(42, $result->getData('meaning_of_life'));

        $this->assertEquals(42, $result->getData('missing_key', 42));
    }

    public function testSetGetErrors()
    {
        $result = new OperationResult();

        $result->addError('foo:error', 'foo');
        $this->assertEquals(['foo' => 'foo:error'], $result->getErrors());

        $result->addError('bar:error');
        $this->assertEquals(['foo' => 'foo:error', 'bar:error'], $result->getErrors());
    }
}
